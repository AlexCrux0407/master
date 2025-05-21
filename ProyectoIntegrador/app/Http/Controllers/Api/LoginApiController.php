<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
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

        if (!$usuario || !Hash::check($request->input('password'), $usuario->password)) {
            return response()->json(['error' => 'Credenciales inválidas.'], 401);
        }

        // Aquí puedes generar un token si usas Sanctum o Passport.
        // Por ahora, solo devolveremos los datos básicos del usuario:

        return response()->json([
            'message' => 'Login exitoso',
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'apellido' => $usuario->apellido,
                'correo' => $usuario->correo,
                'nombreUsuario' => $usuario->nombreUsuario,
            ]
        ]);
    }
}