<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;

Route::get('/', [ControladorVistas::class, 'login'])->name('login');
Route::get('/register', [ControladorVistas::class, 'register'])->name('register');
Route::get('/inicio', [ControladorVistas::class, 'index'])->name('index');

Route::get('/actividades', [ControladorVistas::class, 'actividades'])->name('actividades');
Route::get('/progreso', [ControladorVistas::class, 'progreso'])->name('progreso');
Route::get('/configuracion', [ControladorVistas::class, 'configuracion'])->name('configuracion');
