@extends('layouts.PlantillaBase')

@section('title', 'Ver Estadísticas')

@section('content')
<div class="section container py-5 bg-white shadow-sm rounded" style="max-width: 900px; margin: 0 auto;">
    <h2 class="text-center mb-4">Estadísticas de tu Progreso</h2>
    <p class="text-center mb-5">Consulta tu avance y metas alcanzadas.</p>

    <!-- Progress Bar -->
    <div class="progress-container mb-4">
        <div class="progress-bar bg-light rounded">
            <div class="progress bg-success" style="width: 70%;"></div>
        </div>
        <p class="text-center mt-2"><i class="fas fa-chart-line"></i> <strong>70%</strong> Porcentaje completado</p>
    </div>

    <!-- Stats Icons -->
    <div class="stats-icons row text-center mb-5">
        <div class="stat-icon col-md-4 mb-4">
            <i class="fas fa-trophy fa-3x mb-2"></i>
            <p><strong>Logros obtenidos:</strong> <span class="h4">5</span></p>
        </div>
        <div class="stat-icon col-md-4 mb-4">
            <i class="fas fa-star fa-3x mb-2"></i>
            <p><strong>Puntos totales:</strong> <span class="h4">200</span></p>
        </div>
        <div class="stat-icon col-md-4 mb-4">
            <i class="fas fa-leaf fa-3x mb-2"></i>
            <p><strong>Actividades completadas:</strong> <span class="h4">10</span></p>
        </div>
    </div>

    <!-- Link to Progress Page -->
    <div class="text-center">
        <a href="{{ route('progreso') }}" class="btn btn-success px-4 py-2">Volver al Progreso</a>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/estadisticas.css') }}">

@endsection
