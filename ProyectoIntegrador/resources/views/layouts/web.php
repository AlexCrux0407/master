<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;

// Ruta GET para mostrar el formulario de inicio de sesión
Route::get('/login', [ControladorVistas::class, 'index'])->name('login.view');

// Ruta POST para manejar el inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Ruta POST para registro
Route::post('/registro', [RegistroController::class, 'registrarUsuario'])->name('registro');

// Rutas de tipo GET para otras vistas
Route::get('/', [ControladorVistas::class, 'index'])->name('index');
Route::get('/actividades', [ControladorVistas::class, 'actividades'])->name('actividades');
Route::get('/progreso', [ControladorVistas::class, 'progreso'])->name('progreso');
Route::get('/configuracion', [ControladorVistas::class, 'configuracion'])->name('configuracion');
