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
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);
    
        $login = $request->input('username');
    
        $usuario = Usuario::where('nombreUsuario', $login)
            ->orWhere('correo', $login)
            ->first();
    
        if (!$usuario) {
            return back()->withErrors(['login' => 'Usuario no encontrado.']);
        }
    
        if (!Hash::check($request->input('password'), $usuario->password)) {
            return back()->withErrors(['login' => 'Contraseña incorrecta.']);
        }
    
        // Usando put() para asegurarnos de que los valores se guarden correctamente en la sesión
        session()->put('usuario_id', $usuario->id);
        session()->put('nombreUsuario', $usuario->nombre);
    
        // Verifica que los datos estén ahora en la sesión
       
    
        // Redirige directamente al index después de iniciar sesión
        return redirect()->route('index')->with('exito', '¡Inicio de sesión exitoso!');
    }
    
    
    


    public function logout()
    {
        // Eliminar los datos de la sesión
        session()->forget(['usuario_id', 'nombreUsuario']);

        // Redirigir a la página de inicio de sesión
        return redirect()->route('login');
    }
}
