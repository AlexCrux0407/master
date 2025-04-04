<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ActivitiesController;
use App\Http\Controllers\API\UserProgressController;
use App\Http\Controllers\API\RankingController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Ruta existente para análisis de sentimiento
Route::post('sentiment-analysis', [FeedbackController::class, 'store']);

// Ruta de prueba para la API
Route::get('test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API funcionando correctamente',
        'timestamp' => now()->toDateTimeString()
    ]);
});

// API v1
Route::prefix('v1')->group(function () {
    // Rutas de autenticación
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::post('auth/login', [AuthController::class, 'login']);

    // Rutas públicas - IMPORTANTE: Poner la ruta con parámetro {id} después de la ruta stats
    Route::get('activities', [ActivitiesController::class, 'index']);
    Route::get('activities/stats', [ActivitiesController::class, 'stats']);
    Route::get('activities/{id}', [ActivitiesController::class, 'show']);
    
    // Ranking público
    Route::get('ranking', [RankingController::class, 'index']);
    Route::get('ranking/top', [RankingController::class, 'getTopThree']);
    
    // Rutas protegidas (requieren autenticación)
    Route::middleware('auth:sanctum')->group(function () {
        // Auth
        Route::post('auth/logout', [AuthController::class, 'logout']);
        Route::get('auth/me', [AuthController::class, 'me']);
        
        // Ranking del usuario
        Route::get('ranking/me', [RankingController::class, 'getUserPosition']);
        Route::get('ranking/user/{userId}', [RankingController::class, 'getUserPosition']);
        
        // Actividades del usuario
        Route::get('user/activities', [UserProgressController::class, 'activities']);
        Route::post('user/activities/complete', [UserProgressController::class, 'completeActivity']);
        
        // Progreso del usuario
        Route::get('user/progress', [UserProgressController::class, 'getProgress']);
        Route::get('user/achievements', [UserProgressController::class, 'getAchievements']);
    });
});

// Ruta para verificar que el usuario esté autenticado (debugging)
Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});