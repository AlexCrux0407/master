@extends('layouts.PlantillaBase')

@section('title', 'Progreso')

@section('content')
<div class="section center">
    <h2>Progreso</h2>
    <ul class="options-list">
        <li><a href="#"><i class="fas fa-chart-bar"></i> Ver Estadísticas</a></li>
        <li><a href="#"><i class="fas fa-trophy"></i> Logros</a></li>
        <li><a href="#"><i class="fas fa-bullseye"></i> Metas</a></li>
        <li><a href="{{ route('progreso.activities') }}"><i class="fas fa-check-circle"></i> Actividades Completadas</a></li>
        <li><a href="{{ route('ranking.index') }}"><i class="fas fa-list-ol"></i> Ranking</a></li>
    </ul>
    <div class="image-container small-margin">
        <img src="{{ asset('images/mascota-tortuga2.png') }}" alt="Mascota Tortuga">
    </div>
    <a href="{{ route('index') }}" class="back-link">Volver al Menú Principal</a>
</div>

<style>
    .options-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .options-list li {
        margin: 10px 0;
    }

    .options-list a {
        display: block;
        padding: 10px 20px;
        font-size: 18px;
        text-decoration: none;
        border-radius: 10px;
        color: #0288d1;
        font-weight: bold;
        text-align: center;
        transition: all 0.3s ease;
    }

    .options-list a i {
        margin-right: 10px;
    }

    .options-list a:hover {
        background-color: #0288d1;
        color: white;
    }

    /* Remover el contorno azul al enfocar */
    .options-list a:focus {
        outline: none;
        box-shadow: none;
    }

    .back-link {
        margin-top: 20px;
        color: #0288d1;
        text-decoration: none;
        font-size: 16px;
    }

    .back-link:hover {
        text-decoration: underline;
    }

    .image-container {
        margin: 20px auto;
        text-align: center;
    }

    .image-container img {
        width: 150px;
        height: auto;
    }
</style>
@endsection
