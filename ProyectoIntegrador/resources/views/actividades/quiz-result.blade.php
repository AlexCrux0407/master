@extends('layouts.PlantillaBase')

@section('title', 'Resultados del Quiz')

@section('content')
<div class="section center">
    <h2>Resultados del Quiz</h2>
    <p>¡Has terminado el quiz!</p>
    <p>Tu puntuación es:</p>
    <h3>{{ $score }} / {{ $total }}</h3>

    @if($score === $total)
        <p>¡Excelente trabajo! Sabes mucho sobre el medio ambiente.</p>
    @elseif($score >= $total / 2)
        <p>¡Buen intento! Pero aún puedes aprender más sobre cómo cuidar la naturaleza.</p>
    @else
        <p>No te preocupes, sigue aprendiendo y practicando para mejorar.</p>
    @endif

    <a href="{{ route('index') }}" class="back-link">Volver a Actividades</a>
</div>
@endsection
