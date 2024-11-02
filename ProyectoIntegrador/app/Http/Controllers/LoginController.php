<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Datos de ejemplo para la validación
        $validUsers = [
            'alexis' => '6814',
            'yahir' => '6814',
            'jose' => '6814',
        ];

        $username = $request->input('username');
        $password = $request->input('password');

        // Verificar las credenciales
        if (array_key_exists($username, $validUsers) && $validUsers[$username] === $password) {
            // Autenticación exitosa, redirigir al índice
            return redirect()->route('index')->with('success', '¡Inicio de sesión exitoso!');
        }

        // Autenticación fallida, redirigir de nuevo con un error
        return back()->withErrors(['username' => 'Credenciales incorrectas.'])->withInput();
    }
}
