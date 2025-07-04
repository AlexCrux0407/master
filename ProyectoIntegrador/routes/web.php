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
use App\Http\Controllers\GoogleFaceAuthController; 
use App\Http\Controllers\GestorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

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

// Face Authentication Routes
Route::get('/face-auth', [GoogleFaceAuthController::class, 'showFaceAuth'])->name('face.auth');
Route::post('/face-verify', [GoogleFaceAuthController::class, 'verifyFace'])->name('face.verify');

Route::get('/progreso', [ControladorVistas::class, 'progreso'])->name('progreso');
/* Route::get('/configuracion', [ControladorVistas::class, 'configuracion'])->name('configuracion'); */

/* Route::get('/actividades', [ActividadesController::class, 'actividades'])->name('actividades'); */


/* Route::get('/actividades/quiz', [QuizController::class, 'index'])->name('quiz.index'); */ // Muestra el quiz
/* Route::post('/actividades/quiz/result', [QuizController::class, 'result'])->name('quiz.result'); */ // Procesa las respuestas


/* Route::get('/actividades/juego', [JuegoController::class, 'index'])->name('juego.index'); */

/* Route::get('/actividades/manualidades', [ManualidadesController::class, 'index'])->name('manualidades.index'); */
Route::get('/actividades/historias', [HistoriasController::class, 'index'])->name('historias.index');
// Rutas de inicio y registro
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

// Rutas para autenticación facial con Google
Route::get('/face-auth', [GoogleFaceAuthController::class, 'showFaceAuth'])->name('face.auth');
Route::post('/face-verify', [GoogleFaceAuthController::class, 'verifyFace'])->name('face.verify');

// Ruta para logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard principal - Verificar que sea exactamente así
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// COMENTAR TEMPORALMENTE las rutas con middleware para debug
/*
// Rutas para GESTORES (docentes/padres) - requieren rol gestor o admin
Route::middleware('role:gestor,admin')->group(function () {
    Route::get('/gestor/actividades', [App\Http\Controllers\GestorController::class, 'actividades'])->name('gestor.actividades');
    Route::get('/gestor/imagenes', [App\Http\Controllers\GestorController::class, 'imagenes'])->name('gestor.imagenes');
    Route::get('/gestor/progreso', [App\Http\Controllers\GestorController::class, 'progreso'])->name('gestor.progreso');
    Route::post('/gestor/actividades/toggle', [App\Http\Controllers\GestorController::class, 'toggleActividad'])->name('gestor.actividades.toggle');
    Route::post('/gestor/imagenes/toggle', [App\Http\Controllers\GestorController::class, 'toggleImagen'])->name('gestor.imagenes.toggle');
});

// Rutas para ADMINISTRADORES - solo admin
Route::middleware('role:admin')->group(function () {
    // Gestión de actividades
    Route::get('/admin/actividades/create', [App\Http\Controllers\AdminController::class, 'createActividad'])->name('admin.actividades.create');
    Route::post('/admin/actividades', [App\Http\Controllers\AdminController::class, 'storeActividad'])->name('admin.actividades.store');
    Route::get('/admin/actividades/{id}/edit', [App\Http\Controllers\AdminController::class, 'editActividad'])->name('admin.actividades.edit');
    Route::put('/admin/actividades/{id}', [App\Http\Controllers\AdminController::class, 'updateActividad'])->name('admin.actividades.update');
    Route::delete('/admin/actividades/{id}', [App\Http\Controllers\AdminController::class, 'deleteActividad'])->name('admin.actividades.delete');
    
    // Gestión de experimentos
    Route::get('/admin/experimentos', [App\Http\Controllers\AdminController::class, 'experimentos'])->name('admin.experimentos');
    Route::get('/admin/experimentos/create', [App\Http\Controllers\AdminController::class, 'createExperimento'])->name('admin.experimentos.create');
    Route::post('/admin/experimentos', [App\Http\Controllers\AdminController::class, 'storeExperimento'])->name('admin.experimentos.store');
    Route::get('/admin/experimentos/{id}/edit', [App\Http\Controllers\AdminController::class, 'editExperimento'])->name('admin.experimentos.edit');
    Route::put('/admin/experimentos/{id}', [App\Http\Controllers\AdminController::class, 'updateExperimento'])->name('admin.experimentos.update');
    Route::delete('/admin/experimentos/{id}', [App\Http\Controllers\AdminController::class, 'deleteExperimento'])->name('admin.experimentos.delete');
    
    // Gestión del tablón
    Route::get('/admin/tablon', [App\Http\Controllers\AdminController::class, 'tablon'])->name('admin.tablon');
    Route::post('/admin/tablon', [App\Http\Controllers\AdminController::class, 'storeTablon'])->name('admin.tablon.store');
    Route::put('/admin/tablon/{id}', [App\Http\Controllers\AdminController::class, 'updateTablon'])->name('admin.tablon.update');
    Route::delete('/admin/tablon/{id}', [App\Http\Controllers\AdminController::class, 'deleteTablon'])->name('admin.tablon.delete');
    
    // Gestión del foro
    Route::get('/admin/foro', [App\Http\Controllers\AdminController::class, 'foro'])->name('admin.foro');
    Route::delete('/admin/foro/{id}', [App\Http\Controllers\AdminController::class, 'deletePost'])->name('admin.foro.delete');
    Route::put('/admin/foro/{id}/toggle', [App\Http\Controllers\AdminController::class, 'togglePost'])->name('admin.foro.toggle');
    
    // Gestión de usuarios
    Route::get('/admin/usuarios', [App\Http\Controllers\AdminController::class, 'usuarios'])->name('admin.usuarios');
    Route::put('/admin/usuarios/{id}/role', [App\Http\Controllers\AdminController::class, 'updateUserRole'])->name('admin.usuarios.role');
    Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admin.usuarios.delete');
    
    // Estadísticas
    Route::get('/admin/estadisticas', [App\Http\Controllers\AdminController::class, 'estadisticas'])->name('admin.estadisticas');
});
*/

// Rutas temporales SIN middleware para testing
Route::get('/gestor/actividades', [\App\Http\Controllers\GestorController::class, 'actividades'])->name('gestor.actividades');
Route::get('/admin/usuarios', [\App\Http\Controllers\AdminController::class, 'usuarios'])->name('admin.usuarios');
Route::get('/admin/estadisticas', [\App\Http\Controllers\AdminController::class, 'estadisticas'])->name('admin.estadisticas');
Route::get('/admin/actividades/create', [\App\Http\Controllers\AdminController::class, 'createActividad'])->name('admin.actividades.create');
Route::get('/admin/experimentos', [\App\Http\Controllers\AdminController::class, 'experimentos'])->name('admin.experimentos');
Route::get('/admin/tablon', [\App\Http\Controllers\AdminController::class, 'tablon'])->name('admin.tablon');
Route::get('/admin/foro', [\App\Http\Controllers\AdminController::class, 'foro'])->name('admin.foro');