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
use App\Http\Controllers\RankingController;

Route::get('/progreso/ranking', [RankingController::class, 'index'])->name('ranking.index');



Route::get('/', [ControladorVistas::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegistroController::class, 'index'])->name('registrar');

Route::get('/progreso', [ControladorVistas::class, 'progreso'])->name('progreso');
Route::get('/configuracion', [ControladorVistas::class, 'configuracion'])->name('configuracion');

// Cambié el nombre de la ruta de actividades
Route::get('/actividades', [ActividadesController::class, 'actividades'])->name('actividades');


Route::get('/actividades/quiz', [QuizController::class, 'index'])->name('quiz.index'); // Muestra el quiz
Route::post('/actividades/quiz/result', [QuizController::class, 'result'])->name('quiz.result'); // Procesa las respuestas


Route::get('/actividades/juego', [JuegoController::class, 'index'])->name('juego.index');

Route::get('/actividades/manualidades', [ManualidadesController::class, 'index'])->name('manualidades.index');
Route::get('/actividades/historias', [HistoriasController::class, 'index'])->name('historias.index');

Route::post('/inicio', [LoginController::class, 'login'])->name('iniciar');
Route::post('/enviarusuario', [RegistroController::class, 'store'])->name('enviar');


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