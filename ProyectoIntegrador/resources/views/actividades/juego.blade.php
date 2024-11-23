@extends('layouts.PlantillaBase')

@section('title', 'Juega un Juego')

@section('content')
<div class="section center">
    <h2>Juego de Memoria - Cuida el Medio Ambiente</h2>
    <p>Encuentra las parejas de imágenes relacionadas con el medio ambiente.</p>

    <div id="game-board" class="game-board">
        <!-- Las cartas del juego se generarán aquí -->
    </div>

    <button id="restart-button" class="btn btn-primary">Reiniciar Juego</button>

    <a href="{{ route('actividades') }}" class="back-link">Volver a Actividades</a>
</div>

<!-- Incluir el script del juego -->
<script src="{{ asset('js/juego.js') }}"></script>
<!-- Incluir el estilo del juego -->
<link rel="stylesheet" href="{{ asset('css/juego.css') }}">
@endsection
