@extends('layouts.PlantillaBase')

@section('title', 'Metas')

@section('content')
<div class="section center">
    <h2>Metas Actuales</h2>
    <p>¡Completa tus metas y alcanza nuevos niveles!</p>
    
    <div class="goals-container">
        <div class="goal">
            <p><strong>Ganar 50 puntos</strong></p>
            <div class="progress-bar">
                <div class="progress" style="width: 40%;"></div>
            </div>
            <span>20/50 puntos</span>
        </div>
        <div class="goal">
            <p><strong>Completar 5 actividades</strong></p>
            <div class="progress-bar">
                <div class="progress" style="width: 60%;"></div>
            </div>
            <span>3/5 actividades</span>
        </div>
        <div class="goal">
            <p><strong>Lograr 3 logros</strong></p>
            <div class="progress-bar">
                <div class="progress" style="width: 33%;"></div>
            </div>
            <span>1/3 logros</span>
        </div>
    </div>

    <a href="{{ route('progreso') }}" class="btn-link">Volver al Progreso</a>
</div>
<link rel="stylesheet" href="{{ asset('css/metas.css') }}">

@endsection
