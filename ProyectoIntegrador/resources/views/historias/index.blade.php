@extends('layouts.PlantillaBase')

@section('title', 'Historias')

@section('content')
<div class="section center">
    <h2>Historias de la Comunidad</h2>
    <p>Lee y comparte historias con nuestra comunidad.</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('historias.store') }}" method="POST" class="form-story">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre (opcional):</label>
            <input type="text" name="nombre" id="nombre" placeholder="Anónimo">
        </div>
        <div class="form-group">
            <label for="contenido">Escribe tu historia:</label>
            <textarea name="contenido" id="contenido" rows="5" placeholder="Comparte tu historia..." required></textarea>
        </div>
        <button type="submit" class="btn-submit">Publicar Historia</button>
    </form>

    <div class="card-container">
        @foreach($historias as $historia)
        <div class="card">
            <p class="author">{{ $historia->nombre ?? 'Anónimo' }}</p>
            <p>{{ $historia->contenido }}</p>
            <p class="date">Publicado el {{ $historia->created_at->format('d/m/Y') }}</p>
            <form action="{{ route('historias.destroy', $historia->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/historias.css') }}">

@endsection
