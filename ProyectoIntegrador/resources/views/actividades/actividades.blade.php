@extends('layouts.PlantillaBase')

@section('title', 'Actividades')

@section('content')
<div class="container py-5  bg-white">
    <h2 class="text-center mb-4">Actividades</h2>
    
    <!-- Lista de opciones -->
    <ul class="list-unstyled row row-cols-1 row-cols-md-2 g-4">
        <li class="col">
            <a href="{{ route('quiz.index') }}" class="d-flex align-items-center p-3 border rounded shadow-sm">
                <i class="fas fa-question-circle fa-2x me-3"></i>
                <span>Realiza un Quiz</span>
            </a>
        </li>
        <li class="col">
            <a href="{{ route('juego.index') }}" class="d-flex align-items-center p-3 border rounded shadow-sm">
                <i class="fas fa-gamepad fa-2x me-3"></i>
                <span>Juega un Juego</span>
            </a>
        </li>
        <li class="col">
            <a href="{{ route('manualidades.index') }}" class="d-flex align-items-center p-3 border rounded shadow-sm">
                <i class="fas fa-paint-brush fa-2x me-3"></i>
                <span>Manualidades</span>
            </a>
        </li>
        <li class="col">
            <a href="{{ route('historias.index') }}" class="d-flex align-items-center p-3 border rounded shadow-sm">
                <i class="fas fa-book fa-2x me-3"></i>
                <span>Historias</span>
            </a>
        </li>
    </ul>

    <!-- Imagen con fondo blanco -->
    <div class="text-center mt-4 p-4 rounded shadow-sm">
        <img src="{{ asset('images/mascota-tortuga.png') }}" alt="Mascota Tortuga" class="img-fluid rounded shadow" style="max-width: 17%; height: auto;">
    </div>

    <!-- Enlace de vuelta al menú -->
    <div class="text-center mt-3">
        <a href="{{ route('index') }}" class="btn btn-outline-primary">Volver al Menú Principal</a>
    </div>
</div>
@endsection
