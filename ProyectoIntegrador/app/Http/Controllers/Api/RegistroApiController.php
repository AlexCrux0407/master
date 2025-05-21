<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;  // Modelo Eloquent que representa la tabla usuarios
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistroApiController extends Controller
{
    /**
     * Registrar un nuevo usuario vía API
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'nombreUsuario' => 'required|string|unique:usuarios,nombreUsuario',
            'txtnombre' => 'required|string|max:255',
            'txtapellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo',
            'password' => 'required|string|min:8|confirmed', // password_confirmation esperado
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Crear el usuario
        $usuario = Usuario::create([
            'nombreUsuario' => $request->nombreUsuario,
            'nombre' => $request->txtnombre,
            'apellido' => $request->txtapellido,
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
        ]);

        // Retornar respuesta JSON con éxito
        return response()->json([
            'message' => 'Usuario registrado con éxito',
            'usuario' => $usuario,
        ], 201);
    }
}