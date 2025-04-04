<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\ManualidadesController;
use App\Http\Controllers\HistoriasController;
use App\Http\Controllers\InfoUsuarioController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\ProgresoController;
use App\Http\Controllers\TriviaController; 
use App\Http\Controllers\ApiDocsController; 
use App\Http\Controllers\ApiTesterController; 

use App\Models\Feedback;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use App\Http\Controllers\FeedbackController;




Route::post('/sentiment-analysis', function (Request $request) {
    $comment = $request->input('comment');

    // Enviar a API de Python
    $response = Http::post('http://127.0.0.1:5000/analyze', [
        'text' => $comment
    ]);

    // Guardar resultado en base de datos
    $sentiment = $response->json()['sentiment'];
    Feedback::create([
        'comment' => $comment,
        'sentiment' => $sentiment
    ]);

    return response()->json(['status' => 'success', 'sentiment' => $sentiment]);
});





































// Ruta para el probador de API
Route::get('/api/test-ui', [ApiTesterController::class, 'index'])->name('api.test');

/* 
Route::get('/progreso/actividades', [ProgresoController::class, 'activities'])->name('progreso.activities');
Route::get('/actividades/manualidades', [ManualidadesController::class, 'index'])->name('manualidades.index'); */

//configuracion
Route::get('/InfoUsuario', [InfoUsuarioController::class, 'index'])->name('informacionUsuario');


Route::put('/usuarioUpdate/{id}', [InfoUsuarioController::class, 'update'])->name('ActualizarUsuario');
//historias
Route::get('/historias', [HistoriasController::class, 'index'])->name('historias.index');
Route::post('/historias', [HistoriasController::class, 'store'])->name('historias.store');
Route::delete('/historias/{id}', [HistoriasController::class, 'destroy'])->name('historias.destroy');




Route::get('/', [ControladorVistas::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegistroController::class, 'index'])->name('registrar');

Route::get('/progreso', [ControladorVistas::class, 'progreso'])->name('progreso');
/* Route::get('/configuracion', [ControladorVistas::class, 'configuracion'])->name('configuracion'); */

/* Route::get('/actividades', [ActividadesController::class, 'actividades'])->name('actividades'); */


/* Route::get('/actividades/quiz', [QuizController::class, 'index'])->name('quiz.index'); */ // Muestra el quiz
/* Route::post('/actividades/quiz/result', [QuizController::class, 'result'])->name('quiz.result'); */ // Procesa las respuestas


/* Route::get('/actividades/juego', [JuegoController::class, 'index'])->name('juego.index'); */

/* Route::get('/actividades/manualidades', [ManualidadesController::class, 'index'])->name('manualidades.index'); */
Route::get('/actividades/historias', [HistoriasController::class, 'index'])->name('historias.index');

Route::post('/inicio', [LoginController::class, 'login'])->name('iniciar');
Route::post('/enviarusuario', [RegistroController::class, 'store'])->name('enviar');

Route::get('/progreso/estadisticas', [ControladorVistas::class, 'verEstadisticas'])->name('progreso.estadisticas');
Route::get('/progreso/logros', [ControladorVistas::class, 'logros'])->name('progreso.logros');
Route::get('/progreso/metas', [ControladorVistas::class, 'metas'])->name('progreso.metas');




//protegidos
Route::get('/actividades/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/actividades/quiz/resultados', [ControladorVistas::class, 'quizresultado'])->name('quizResultado');
Route::get('/progreso/ranking', [RankingController::class, 'index'])->name('ranking.index');
Route::get('/progreso/actividades', [ProgresoController::class, 'activities'])->name('progreso.activities');
Route::get('/actividades/manualidades', [ManualidadesController::class, 'index'])->name('manualidades.index');
Route::get('/configuracion', [ControladorVistas::class, 'configuracion'])->name('configuracion');

Route::get('/actividades', [ActividadesController::class, 'actividades'])->name('actividades');
Route::post('/actividades/quiz/result', [QuizController::class, 'result'])->name('quiz.result'); // Procesa las respuestas

Route::get('/actividades/juego', [JuegoController::class, 'index'])->name('juego.index');
Route::get('/actividades/manualidades', [ManualidadesController::class, 'index'])->name('manualidades.index');

/* Route::middleware(['auth'])->group(function () {
    Route::get('/actividades/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/progreso/ranking', [RankingController::class, 'index'])->name('ranking.index');
    Route::get('/progreso/actividades', [ProgresoController::class, 'activities'])->name('progreso.activities');
    Route::get('/actividades/manualidades', [ManualidadesController::class, 'index'])->name('manualidades.index');
    Route::get('/configuracion', [ControladorVistas::class, 'configuracion'])->name('configuracion');

    Route::get('/actividades', [ActividadesController::class, 'actividades'])->name('actividades');
    Route::post('/actividades/quiz/result', [QuizController::class, 'result'])->name('quiz.result'); // Procesa las respuestas

    Route::get('/actividades/juego', [JuegoController::class, 'index'])->name('juego.index');
    Route::get('/actividades/manualidades', [ManualidadesController::class, 'index'])->name('manualidades.index');
}); */


// Ruta para la documentación de la API
Route::get('/api/docs', [ApiDocsController::class, 'index'])->name('api.docs');











/* // Ruta GET para mostrar el formulario de inicio de sesión
Route::get('/login', [ControladorVistas::class, 'login'])->name('login');

// Ruta POST para manejar el inicio de sesión
Route::post('/login/iniciar', [LoginController::class, 'login'])->name('iniciar');

// Ruta POST para registro
Route::post('/registro', [RegistroController::class, 'registrarUsuario'])->name('registro');

// Rutas de tipo GET para otras vistas
Route::get('/', [ControladorVistas::class, 'index'])->name('index');
Route::get('/actividades', [ControladorVistas::class, 'actividades'])->name('actividades');
Route::get('/progreso', [ControladorVistas::class, 'progreso'])->name('progreso');
Route::get('/configuracion', [ControladorVistas::class, 'configuracion'])->name('configuracion');
 */

// Rutas para Open Trivia Database API
Route::prefix('trivia')->group(function () {
    Route::get('/', [TriviaController::class, 'index'])->name('trivia.index');
    Route::get('/quiz', [TriviaController::class, 'generateQuiz'])->name('trivia.generate');
    Route::post('/submit', [TriviaController::class, 'submitQuiz'])->name('trivia.submit');
});

// Ruta de prueba para la API
Route::get('/api/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API funcionando correctamente',
        'timestamp' => now()->toDateTimeString()
    ]);
});

// Rutas API para testing
Route::prefix('api/v1')->group(function () {
    Route::post('/auth/register', [App\Http\Controllers\API\AuthController::class, 'register']);
    Route::post('/auth/login', [App\Http\Controllers\API\AuthController::class, 'login']);
    
    // Rutas de actividades para testing
    Route::get('/activities', [App\Http\Controllers\API\ActivitiesController::class, 'index']);
    Route::get('/activities/stats', [App\Http\Controllers\API\ActivitiesController::class, 'stats']);
    Route::get('/activities/{id}', [App\Http\Controllers\API\ActivitiesController::class, 'show']);
    

});