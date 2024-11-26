@extends('layouts.PlantillaBase')

@section('title', 'Metas')

@section('content')
<div class="section container py-5 bg-light rounded shadow-sm" style="max-width: 900px; margin: 0 auto;">
    <h2 class="text-center mb-4">Metas Actuales</h2>
    <p class="text-center mb-5">¡Completa tus metas y alcanza nuevos niveles!</p>
    
    <div class="goals-container">
        <div class="goal card shadow-sm mb-4">
            <div class="card-body">
                <p><strong>Ganar 50 puntos</strong></p>
                <div class="progress">
                    <div class="progress-bar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                </div>
                <small class="text-muted">20/50 puntos</small>
            </div>
        </div>

        <div class="goal card shadow-sm mb-4">
            <div class="card-body">
                <p><strong>Completar 5 actividades</strong></p>
                <div class="progress">
                    <div class="progress-bar bg-info" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                </div>
                <small class="text-muted">3/5 actividades</small>
            </div>
        </div>

        <div class="goal card shadow-sm mb-4">
            <div class="card-body">
                <p><strong>Lograr 3 logros</strong></p>
                <div class="progress">
                    <div class="progress-bar bg-success" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">33%</div>
                </div>
                <small class="text-muted">1/3 logros</small>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('progreso') }}" class="btn btn-primary px-4 py-2">Volver al Progreso</a>
    </div>
</div>

{{-- <link rel="stylesheet" href="{{ asset('css/metas.css') }}"> --}}
@endsection
