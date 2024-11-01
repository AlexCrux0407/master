@extends('layouts.PlantillaBase')

@section('title', 'Progreso')

@section('content')
<div class="section center">
    <h2>Progreso</h2>
    <ul class="options-list">
        <li><a href="#"><i class="fas fa-chart-bar"></i> Ver Estadísticas</a></li>
        <li><a href="#"><i class="fas fa-trophy"></i> Logros</a></li>
        <li><a href="#"><i class="fas fa-bullseye"></i> Metas</a></li>
        <li><a href="#"><i class="fas fa-check-circle"></i> Actividades Completadas</a></li>
        <li><a href="#"><i class="fas fa-list-ol"></i> Ranking</a></li>
    </ul>
    <div class="image-container small-margin">
        <img src="{{ asset('images/mascota-tortuga2.png') }}" alt="Mascota Tortuga">
    </div>
    <a href="{{ route('index') }}" class="back-link">Volver al Menú Principal</a>
</div>
@endsection
