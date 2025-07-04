<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Quitar el dd() y usar la lógica completa
        if (!session()->has('usuario_id')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        $rol = session('rol', 'alumno');
        
        // Debug: mostrar información de sesión
        \Log::info("Dashboard - Usuario ID: " . session('usuario_id') . ", Rol: " . $rol);

        switch ($rol) {
            case 'admin':
                return view('dashboard.admin');
            case 'gestor':
                \Log::info("Redirigiendo a dashboard.gestor");
                return view('dashboard.gestor');
            case 'alumno':
            default:
                \Log::info("Redirigiendo alumno al index");
                return redirect()->route('index');
        }
    }
}

