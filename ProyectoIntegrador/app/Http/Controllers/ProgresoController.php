<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProgresoController extends Controller
{
    public function activities()
{
    $usuarioId = auth()->id();
    $activities = DB::table('completed_activities')
        ->where('usuario_id', $usuarioId)
        ->orderBy('completed_at', 'desc')
        ->get();

    return view('progreso.activities', compact('activities'));
}

}
