@extends('layouts.PlantillaBase')

@section('title', 'Logros')

@section('content')
<div class="section container py-5 bg-light shadow-sm rounded" style="max-width: 900px; margin: 0 auto;">
    <h2 class="text-center mb-4">Logros Obtenidos</h2>
    <p class="text-center mb-5">¡Felicitaciones! Estos son los logros que has desbloqueado.</p>
    
    <div class="achievements-container row justify-content-center">
        <div class="achievement col-md-4 mb-4 text-center p-4 bg-white shadow-sm rounded">
            <i class="fas fa-medal fa-4x mb-3 text-warning"></i>
            <p><strong>Primer Logro</strong></p>
            <span>Completa tu primera actividad</span>
        </div>
        <div class="achievement col-md-4 mb-4 text-center p-4 bg-white shadow-sm rounded">
            <i class="fas fa-trophy fa-4x mb-3 text-success"></i>
            <p><strong>10 Actividades</strong></p>
            <span>Completa 10 actividades en total</span>
        </div>
        <div class="achievement col-md-4 mb-4 text-center p-4 bg-white shadow-sm rounded">
            <i class="fas fa-star fa-4x mb-3 text-primary"></i>
            <p><strong>100 Puntos</strong></p>
            <span>Alcanza los 100 puntos acumulados</span>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('progreso') }}" class="btn btn-primary px-4 py-2">Volver al Progreso</a>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/logros.css') }}">

@endsection
