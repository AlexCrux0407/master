@extends('layouts.PlantillaBase')

@section('title', 'Logros')

@section('content')
<div class="section center">
    <h2>Logros Obtenidos</h2>
    <p>¡Felicitaciones! Estos son los logros que has desbloqueado.</p>
    
    <div class="achievements-container">
        <div class="achievement">
            <i class="fas fa-medal"></i>
            <p><strong>Primer Logro</strong></p>
            <span>Completa tu primera actividad</span>
        </div>
        <div class="achievement">
            <i class="fas fa-trophy"></i>
            <p><strong>10 Actividades</strong></p>
            <span>Completa 10 actividades en total</span>
        </div>
        <div class="achievement">
            <i class="fas fa-star"></i>
            <p><strong>100 Puntos</strong></p>
            <span>Alcanza los 100 puntos acumulados</span>
        </div>
    </div>

    <a href="{{ route('progreso') }}" class="btn-link">Volver al Progreso</a>
</div>
<link rel="stylesheet" href="{{ asset('css/logros.css') }}">

@endsection
