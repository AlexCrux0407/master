<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Feedback;

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
