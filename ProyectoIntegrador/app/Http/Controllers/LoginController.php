<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Quitar el dd() y continuar con el flujo normal
        // dd("El método login se está ejecutando correctamente", $request->all());
        
        // Cambiar temporalmente el driver de sesión a archivo
        config(['session.driver' => 'file']);

        // Validación de datos del formulario
        try {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string|min:8',
            ]);
        } catch (\Exception $e) {
            \Log::error("Error en validación: " . $e->getMessage());
            return back()->withErrors(['login' => 'Error en validación de datos']);
        }

        // Buscar al usuario por nombreUsuario o correo
        $login = $request->input('username');
        \Log::info("Buscando usuario: " . $login);
        
        $usuario = Usuario::where('nombreUsuario', $login)
            ->orWhere('correo', $login)
            ->first();

        // Validar si el usuario existe
        if (!$usuario) {
            \Log::warning("Usuario no encontrado: " . $login);
            return back()->withErrors(['login' => 'Usuario no encontrado.']);
        }

        \Log::info("Usuario encontrado: " . $usuario->nombreUsuario);

        // Validar contraseña
        if (!Hash::check($request->input('password'), $usuario->password)) {
            \Log::warning("Contraseña incorrecta para: " . $login);
            return back()->withErrors(['login' => 'Contraseña incorrecta.']);
        }

        \Log::info("Contraseña correcta para: " . $login);

        // Si el usuario no tiene rol asignado, determinarlo por el correo y actualizarlo
        if (empty($usuario->rol)) {
            $rol = $this->determinarRol($usuario->correo);
            $usuario->update(['rol' => $rol]);
        } else {
            $rol = $usuario->rol;
        }
        
        // Almacenar datos del usuario en la sesión
        $request->session()->put('usuario_id', $usuario->id);
        $request->session()->put('nombreUsuario', $usuario->nombreUsuario);
        $request->session()->put('nombre', $usuario->nombre);
        $request->session()->put('apellido', $usuario->apellido);
        $request->session()->put('correo', $usuario->correo);
        $request->session()->put('rol', $rol);

        // PRUEBA: En lugar de redirigir, mostrar directamente la vista
        switch ($rol) {
            case 'admin':
                return view('dashboard.admin');
            case 'gestor':
                return view('dashboard.gestor');
            case 'alumno':
            default:
                return redirect()->route('index')->with('exito', '¡Inicio de sesión exitoso!');
        }
    }

    /**
     * Determinar el rol del usuario basado en el dominio del correo
     */
    private function determinarRol($correo)
    {
        // Extraer solo el dominio después del @
        $dominio = substr(strrchr($correo, "@"), 1);
        
        // Debug: agregar log para ver qué dominio se está detectando
        \Log::info("Correo: $correo, Dominio extraído: $dominio");
        
        switch ($dominio) {
            case 'alumno':
                return 'alumno';
            case 'docente.com':
            case 'padre.com':
                return 'gestor';
            case 'admin.com':
                return 'admin';
            default:
                \Log::warning("Dominio no reconocido: $dominio para correo: $correo");
                return 'alumno'; // Rol por defecto
        }
    }

    public function logout()
    {
        // Eliminar los datos de la sesión
        session()->flush();

        // Redirigir a la página de inicio de sesión
        return redirect()->route('login');
    }
}


