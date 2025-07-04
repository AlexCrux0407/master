<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestorController extends Controller
{
    public function actividades()
    {
        $actividades = DB::table('actividades')->get();
        return view('gestor.actividades', compact('actividades'));
    }

    public function imagenes()
    {
        $imagenes = DB::table('imagenes')->get();
        return view('gestor.imagenes', compact('imagenes'));
    }

    public function progreso()
    {
        $usuarios = DB::table('usuarios')
            ->join('ranking', 'usuarios.id', '=', 'ranking.usuario_id')
            ->select('usuarios.nombre', 'usuarios.apellido', 'ranking.puntos', 'ranking.nivel')
            ->where('usuarios.rol', 'alumno')
            ->get();
        
        return view('gestor.progreso', compact('usuarios'));
    }

    public function toggleActividad(Request $request)
    {
        $actividad_id = $request->input('actividad_id');
        $activo = $request->input('activo');

        DB::table('actividades')
            ->where('id', $actividad_id)
            ->update(['activo' => $activo]);

        return response()->json(['success' => true]);
    }

    public function toggleImagen(Request $request)
    {
        $imagen_id = $request->input('imagen_id');
        $visible = $request->input('visible');

        DB::table('imagenes')
            ->where('id', $imagen_id)
            ->update(['visible' => $visible]);

        return response()->json(['success' => true]);
    }
}
