@extends('layouts.PlantillaBase')

@section('title', 'Khan Academy - Ejercicios')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0 text-center">Ejercicios de Matemáticas de Khan Academy</h2>
                </div>
                <div class="card-body">
                    @if(empty($exercises))
                        <div class="alert alert-warning">
                            No se pudieron cargar los ejercicios. Por favor, intenta más tarde.
                        </div>
                    @else
                        <div class="accordion" id="exercisesAccordion">
                            @foreach($exercises as $index => $topic)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                            {{ $topic['title'] ?? 'Tema sin título' }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#exercisesAccordion">
                                        <div class="accordion-body">
                                            @if(!empty($topic['children']))
                                                <div class="list-group">
                                                    @foreach($topic['children'] as $exercise)
                                                        <a href="https://www.khanacademy.org{{ $exercise['url'] ?? '#' }}" class="list-group-item list-group-item-action" target="_blank">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1">{{ $exercise['title'] ?? 'Sin título' }}</h5>
                                                                <small>{{ $exercise['difficulty'] ?? '' }}</small>
                                                            </div>
                                                            <p class="mb-1">{{ $exercise['description'] ?? 'Sin descripción' }}</p>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="text-muted">No hay ejercicios disponibles para este tema.</p>
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