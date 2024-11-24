<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'question1' => 'b',
            'question2' => 'b',
            'question3' => 'c',
            'question4' => 'b',
            'question5' => 'a',
        ];

        // Calcula la puntuación
        $score = 0;
        foreach ($answers as $question => $correctAnswer) {
            if ($request->input($question) === $correctAnswer) {
                $score++;
            }
        }

        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            $usuarioId = auth()->id();
            $quizName = "Quiz de Naturaleza";

            try {
                // Inserta el registro en la base de datos
                DB::table('completed_activities')->insert([
                    'usuario_id' => $usuarioId,
                    'activity_type' => 'quiz',
                    'activity_name' => $quizName,
                    'points' => $score * 10, // Supongamos 10 puntos por respuesta correcta
                    'completed_at' => now(),
                ]);
            } catch (\Exception $e) {
                // Registra el error si ocurre algún problema
                \Log::error('Error al registrar actividad: ' . $e->getMessage());
                return back()->with('error', 'Hubo un error al registrar la actividad. Inténtalo nuevamente.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para completar el quiz.');
        }

        // Envía la puntuación a la vista de resultados
        return view('actividades.quiz-result', [
            'score' => $score,
            'total' => count($answers),
        ]);
    }

    /**
     * Método para depurar si el usuario está autenticado.
     */
    public function finishQuiz(Request $request)
    {
        // Depura el ID del usuario
        dd(auth()->id());
    }
}
