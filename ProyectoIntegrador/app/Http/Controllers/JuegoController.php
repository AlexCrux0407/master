<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoController extends Controller
{
    /**
     * Muestra la vista principal del juego.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('actividades.juego'); // Asegúrate de que la vista esté en resources/views/actividades/juego.blade.php
    }

    /**
     * (Opcional) Método para procesar datos del juego si es necesario en el futuro.
     * Por ejemplo, para guardar puntuaciones o estadísticas en la base de datos.
     */
    public function saveScore(Request $request)
    {
        // Aquí puedes guardar la puntuación del jugador si implementas un sistema de puntuación
        // Ejemplo:
        /*
        $score = $request->input('score'); // Recoge la puntuación del juego enviada desde JavaScript
        $userId = auth()->id(); // Obtiene el ID del usuario autenticado
        GameScore::create([
            'user_id' => $userId,
            'score' => $score,
        ]);
        */
        return response()->json(['message' => 'Puntuación guardada correctamente']);
    }
}
