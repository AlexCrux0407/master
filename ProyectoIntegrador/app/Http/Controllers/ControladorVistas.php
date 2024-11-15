<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorVistas extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function actividades()
    {
        return view('actividades');
    }

    public function progreso()
    {
        return view('progreso');
    }

    public function configuracion()
    {
        return view('configuracion');
    }
}
