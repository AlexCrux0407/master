@extends('layouts.PlantillaBase')

@section('title', 'Ver Estadísticas')

@section('content')
<div class="section center">
    <h2>Estadísticas de tu Progreso</h2>
    <p>Consulta tu avance y metas alcanzadas.</p>
    
    <div class="progress-container">
        <div class="progress-bar">
            <div class="progress" style="width: 70%;">70%</div>
        </div>
        <p><i class="fas fa-chart-line"></i> Porcentaje completado</p>
    </div>
    
    <div class="stats-icons">
        <div class="stat-icon">
            <i class="fas fa-trophy"></i>
            <p>Logros obtenidos: <strong>5</strong></p>
        </div>
        <div class="stat-icon">
            <i class="fas fa-star"></i>
            <p>Puntos totales: <strong>200</strong></p>
        </div>
        <div class="stat-icon">
            <i class="fas fa-leaf"></i>
            <p>Actividades completadas: <strong>10</strong></p>
        </div>
    </div>

    <a href="{{ route('progreso') }}" class="btn-link">Volver al Progreso</a>
</div>
<link rel="stylesheet" href="{{ asset('css/estadisticas.css') }}">

@endsection
