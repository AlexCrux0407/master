<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'username' => 'required|string', // Cambiado a 'username' para coincidir con el formulario HTML
            'password' => 'required|string|min:8',
        ]);
    
        // Obtener el input de "username"
        $login = $request->input('username');
    
        // Buscar al usuario por nombre de usuario o correo
        $usuario = Usuario::where('nombreUsuario', $login)
            ->orWhere('correo', $login)
            ->first();
    
        // Verificar si el usuario existe
        if (!$usuario) {
            return back()->withErrors(['login' => 'Usuario no encontrado.']);
        }
    
        // Verificar la contraseña
        if (!Hash::check($request->input('password'), $usuario->password)) {
            return back()->withErrors(['login' => 'Contraseña incorrecta.']);
        }
    
        // Si el usuario y la contraseña son correctos
        session(['usuario_id' => $usuario->id, 'nombreUsuario' => $usuario->nombre]);
    
        return redirect()->route('index')->with('exito', 'Inicio de sesión exitoso.');
    }
    
    public function logout()
    {
        // Eliminar los datos de la sesión
        session()->forget(['usuario_id', 'nombreUsuario']);

        // Redirigir a la página de inicio de sesión
        return redirect()->route('login');
    }
}
