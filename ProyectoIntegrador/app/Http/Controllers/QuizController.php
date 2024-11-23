<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Muestra la vista del Quiz.
     */
    public function index()
    {
        return view('actividades.quiz'); // Asegúrate de tener esta vista en resources/views/actividades/quiz.blade.php
    }

    /**
     * Procesa las respuestas del Quiz y muestra los resultados.
     */
    public function result(Request $request)
    {
        // Respuestas correctas del Quiz
        $answers = [
            'question1' => 'b', // Botellas de plástico
            'question2' => 'b', // Aplastarla para reducir su volumen
            'question3' => 'c', // Marrón
            'question4' => 'b', // Gastamos más energía eléctrica
            'question5' => 'a'  // Tortugas marinas
        ];

        // Calcula la puntuación
        $score = 0;

        foreach ($answers as $question => $correctAnswer) {
            if ($request->input($question) === $correctAnswer) {
                $score++;
            }
        }

        // Envía la puntuación a la vista de resultados
        return view('actividades.quiz-result', [
            'score' => $score,
            'total' => count($answers),
        ]);
    }
}
