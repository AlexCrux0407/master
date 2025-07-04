<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    // Gestión de actividades
    public function createActividad()
    {
        return view('admin.actividades.create');
    }

    public function storeActividad(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string',
            'dificultad' => 'required|string'
        ]);

        DB::table('actividades')->insert([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'dificultad' => $request->dificultad,
            'activo' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('admin.actividades.create')->with('success', 'Actividad creada exitosamente');
    }

    // Gestión de experimentos
    public function experimentos()
    {
        $experimentos = DB::table('experimentos')->get();
        return view('admin.experimentos.index', compact('experimentos'));
    }

    public function createExperimento()
    {
        return view('admin.experimentos.create');
    }

    public function storeExperimento(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'materiales' => 'required|string',
            'instrucciones' => 'required|string'
        ]);

        DB::table('experimentos')->insert([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'materiales' => $request->materiales,
            'instrucciones' => $request->instrucciones,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('admin.experimentos')->with('success', 'Experimento creado exitosamente');
    }

    // Gestión del tablón
    public function tablon()
    {
        $anuncios = DB::table('tablon')->orderBy('created_at', 'desc')->get();
        return view('admin.tablon', compact('anuncios'));
    }

    public function storeTablon(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'tipo' => 'required|string'
        ]);

        DB::table('tablon')->insert([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'tipo' => $request->tipo,
            'usuario_id' => session('usuario_id'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('admin.tablon')->with('success', 'Anuncio publicado exitosamente');
    }

    // Gestión del foro
    public function foro()
    {
        $posts = DB::table('foro')
            ->join('usuarios', 'foro.usuario_id', '=', 'usuarios.id')
            ->select('foro.*', 'usuarios.nombre', 'usuarios.apellido')
            ->orderBy('foro.created_at', 'desc')
            ->get();
        
        return view('admin.foro', compact('posts'));
    }

    public function deletePost($id)
    {
        DB::table('foro')->where('id', $id)->delete();
        return redirect()->route('admin.foro')->with('success', 'Post eliminado exitosamente');
    }

    // Gestión de usuarios
    public function usuarios()
    {
        $usuarios = DB::table('usuarios')->get();
        return view('admin.usuarios', compact('usuarios'));
    }

    public function updateUserRole(Request $request, $id)
    {
        $request->validate([
            'rol' => 'required|in:alumno,gestor,admin'
        ]);

        DB::table('usuarios')
            ->where('id', $id)
            ->update(['rol' => $request->rol]);

        return redirect()->route('admin.usuarios')->with('success', 'Rol actualizado exitosamente');
    }

    public function deleteUser($id)
    {
        DB::table('usuarios')->where('id', $id)->delete();
        return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado exitosamente');
    }

    // Estadísticas
    public function estadisticas()
    {
        $stats = [
            'total_usuarios' => DB::table('usuarios')->count(),
            'total_alumnos' => DB::table('usuarios')->where('rol', 'alumno')->count(),
            'total_gestores' => DB::table('usuarios')->where('rol', 'gestor')->count(),
            'total_admins' => DB::table('usuarios')->where('rol', 'admin')->count(),
        ];

        return view('admin.estadisticas', compact('stats'));
    }
}
    
