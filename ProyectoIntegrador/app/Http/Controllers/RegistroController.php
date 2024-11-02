<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registrarUsuario(Request $request)
    {
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'username' => 'required|string|min:3|max:20|unique:users,username',
            'correo_electronico' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Si la validación pasa, puedes proceder a crear el usuario
        // Ejemplo de almacenamiento (suponiendo que tienes el modelo User):
        // User::create([
        //     'username' => $validatedData['username'],
        //     'email' => $validatedData['correo_electronico'],
        //     'password' => bcrypt($validatedData['password']),
        // ]);

        return redirect()->back()->with('success', 'Usuario registrado exitosamente');
    }
}
