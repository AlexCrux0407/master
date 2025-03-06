@extends('layouts.PlantillaBase')

@section('title', 'Khan Academy - Contenido Incrustado')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h2 class="mb-0 text-center">Contenido de Khan Academy</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead text-center mb-4">
                            Explora estos recursos educativos seleccionados de Khan Academy
                        </p>

                        @if(empty($content))
                            <div class="alert alert-warning">
                                No hay contenido disponible en este momento. Por favor, intenta más tarde.
                            </div>
                        @else
                            <div class="row">
                                @foreach($content as $item)
                                    <div class="col-lg-6 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">{{ $item['title'] }}</h5>
                                                <small class="text-muted">{{ $item['topic'] }}</small>
                                            </div>
                                            <div class="card-body">
                                                <div class="ratio ratio-16x9 mb-3">
                                                    <iframe src="{{ $item['embed_url'] }}" title="{{ $item['title'] }}"
                                                        frameborder="0" allowfullscreen class="rounded">
                                                    </iframe>
                                                </div>
                                                <a href="{{ $item['ka_url'] }}" class="btn btn-outline-success w-100"
                                                    target="_blank">
                                                    Ver en Khan Academy
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('khan.topics') }}" class="btn btn-outline-primary me-2">Ver temas</a>
                    <a href="{{ route('index') }}" class="btn btn-success">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
@endsection