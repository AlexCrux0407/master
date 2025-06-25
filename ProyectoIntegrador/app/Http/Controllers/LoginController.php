<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
{
    // Validación de datos del formulario
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    // Buscar al usuario por nombreUsuario o correo
    $login = $request->input('username');
    $usuario = Usuario::where('nombreUsuario', $login)
        ->orWhere('correo', $login)
        ->first();

    // Validar si el usuario existe
    if (!$usuario) {
        return back()->withErrors(['login' => 'Usuario no encontrado.']);
    }

    // Validar contraseña
    if (!Hash::check($request->input('password'), $usuario->password)) {
        return back()->withErrors(['login' => 'Contraseña incorrecta.']);
    }

    //Regenerar la sesión para evitar fixation
    $request->session()->regenerate();

    // Almacenar datos del usuario en la sesión
    session()->put('usuario_id', $usuario->id);
    session()->put('nombreUsuario', $usuario->nombreUsuario);
    session()->put('nombre', $usuario->nombre);
    session()->put('apellido', $usuario->apellido);
    session()->put('correo', $usuario->correo);

    // Redirigir al index con un mensaje de éxito
    return redirect()->route('index')->with('exito', '¡Inicio de sesión exitoso!');

    Log::info('Inicio de sesión exitoso', [
    'usuario_id' => $usuario->id,
    'ip' => request()->ip(),
    'navegador' => request()->header('User-Agent'),
    'fecha' => now(),
    ]);
    Log::warning('Intento de acceso fallido', [
        'usuario_input' => $request->input('username'),
        'ip' => request()->ip(),
        'navegador' => request()->header('User-Agent'),
        'fecha' => now(),
    ]);

}


    public function logout()
    {
        // Eliminar los datos de la sesión
        session()->forget(['usuario_id', 'nombreUsuario']);

        // Redirigir a la página de inicio de sesión
        return redirect()->route('login');
    }
}
