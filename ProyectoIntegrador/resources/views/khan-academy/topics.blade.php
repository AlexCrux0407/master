@extends('layouts.PlantillaBase')

@section('title', 'Khan Academy - Temas')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0 text-center">Temas de Khan Academy</h2>
                </div>
                <div class="card-body">
                    @if(isset($error) && $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
                    @elseif(empty($topics))
                        <div class="alert alert-warning">
                            No se pudieron cargar los temas. Por favor, intenta más tarde.
                        </div>
                    @else
                        <div class="row">
                            @foreach($topics as $topic)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $topic['title'] ?? 'Sin título' }}</h5>
                                            <p class="card-text">{{ $topic['description'] ?? 'Sin descripción' }}</p>
                                            @if(isset($topic['slug']))
                                                <a href="https://www.khanacademy.org/{{ $topic['slug'] }}" 
                                                   class="btn btn-sm btn-outline-success"
                                                   target="_blank">
                                                    Ver en Khan Academy
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('index') }}" class="btn btn-success">Volver al inicio</a>
            </div>
        </div>
    </div>
</div>
@endsection