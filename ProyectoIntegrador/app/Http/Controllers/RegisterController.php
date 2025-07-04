<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'nombreUsuario' => 'required|string|max:255|unique:usuarios',
            'correo' => 'required|email|unique:usuarios|regex:/^[^@]+@(alumno|docente|padre|admin)$/',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'correo.regex' => 'El correo debe tener un dominio válido: @alumno, @docente, @padre o @admin'
        ]);

        $rol = $this->determinarRol($request->correo);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'nombreUsuario' => $request->nombreUsuario,
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
            'rol' => $rol,
        ]);

        session()->put('usuario_id', $usuario->id);
        session()->put('nombreUsuario', $usuario->nombreUsuario);
        session()->put('nombre', $usuario->nombre);
        session()->put('apellido', $usuario->apellido);
        session()->put('correo', $usuario->correo);
        session()->put('rol', $rol);

        return redirect()->route('index')->with('exito', '¡Registro exitoso! Bienvenido a la plataforma.');
    }

    private function determinarRol($correo)
    {
        $dominio = substr(strrchr($correo, "@"), 1);
        
        switch ($dominio) {
            case 'alumno':
                return 'alumno';
            case 'docente':
            case 'padre':
                return 'gestor';
            case 'admin':
                return 'admin';
            default:
                return 'alumno';
        }
    }
}

