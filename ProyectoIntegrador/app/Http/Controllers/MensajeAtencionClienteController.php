<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\MensajeAtencionCliente;

class MensajeAtencionClienteController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'motivo' => 'required|string|max:255',
        'mensaje' => 'required|string|min:10',
    ]);

    // 1. Guardar en la base de datos
    $mensaje = MensajeAtencionCliente::create([
        'motivo' => $request->motivo,
        'mensaje' => $request->mensaje,
    ]);

    // 2. Enviar a ClickUp
    $response = Http::withToken(config('services.clickup.api_key'))
        ->post("https://api.clickup.com/api/v2/list/" . config('services.clickup.list_id') . "/task", [
            'name' => $request->motivo,
            'description' => $request->mensaje,
            'status' => 'Open',
        ]);

    if ($response->failed()) {
        \Log::error('Error al crear tarea en ClickUp', [
            'response' => $response->body()
        ]);
    }

    return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
}
}
