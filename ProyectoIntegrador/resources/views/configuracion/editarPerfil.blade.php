@extends('layouts.PlantillaBase')

@section('title', 'Página de Hábitos')

@section('content')

<div class="container">

    <div class="container mt-5">
        <h2>Actualizar Nombre de Usuario</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('ActualizarUsuario', ['id' => session('usuario_id')]) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nombreUsuario" class="form-label">Nuevo Nombre de Usuario</label>
                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" value="{{ session('nombreUsuario') }}" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        
    </div>
    
</div>
@endsection
