<?php

use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\RegistroApiController;
use App\Http\Controllers\Api\TriviaApiController;
use App\Http\Controllers\Api\HistoriasApiController;

Route::post('/login', [LoginApiController::class, 'login']);
Route::post('/register', [RegistroApiController::class, 'store']);

Route::get('/trivia', [TriviaApiController::class, 'generateQuiz']);
Route::post('/trivia/submit', [TriviaApiController::class, 'submitQuiz']);

Route::get('/historias', [HistoriasApiController::class, 'index']);
Route::post('/historias', [HistoriasApiController::class, 'store']);
Route::delete('/historias/{id}', [HistoriasApiController::class, 'destroy']);
