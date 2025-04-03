<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTesterController extends Controller
{
    /**
     * Mostrar la interfaz para probar la API
     */
    public function index()
    {
        return view('api.tester');
    }
}