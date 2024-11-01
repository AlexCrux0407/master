@extends('layouts.PlantillaBase')

@section('title', 'Actividades')

@section('content')
<div class="section center">
    <h2>Actividades</h2>
    <ul class="options-list">
        <li><a href="#"><i class="fas fa-question-circle"></i> Realiza un Quiz</a></li>
        <li><a href="#"><i class="fas fa-gamepad"></i> Juega un Juego</a></li>
        <li><a href="#"><i class="fas fa-paint-brush"></i> Manualidades</a></li>
        <li><a href="#"><i class="fas fa-book"></i> Historias</a></li>
    </ul>
    <div class="image-container small-margin">
        <img src="{{ asset('images/mascota-tortuga.png') }}" alt="Mascota Tortuga">
    </div>
    <a href="{{ route('index') }}" class="back-link">Volver al Menú Principal</a>
</div>
@endsection
