@extends('layouts.PlantillaBase')

@section('title', 'Khan Academy - Video')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0 text-center">{{ $video['title'] ?? 'Video de Khan Academy' }}</h2>
                </div>
                <div class="card-body">
                    @if(empty($video))
                        <div class="alert alert-warning">
                            No se pudo cargar el video. Por favor, intenta más tarde.
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12">
                                @if(isset($video['youtube_id']))
                                    <div class="ratio ratio-16x9 mb-4">
                                        <iframe 
                                            src="https://www.youtube.com/embed/{{ $video['youtube_id'] }}" 
                                            title="{{ $video['title'] ?? 'Video de Khan Academy' }}" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                @endif
                                
                                <h3>Descripción</h3>
                                <p>{{ $video['description'] ?? 'Sin descripción disponible.' }}</p>
                                
                                @if(isset($video['related_videos']) && count($video['related_videos']) > 0)
                                    <h3 class="mt-4">Videos relacionados</h3>
                                    <div class="row">
                                        @foreach($video['related_videos'] as $relatedVideo)
                                            <div class="col-md-4 mb-3">
                                                <div class="card h-100">
                                                    @if(isset($relatedVideo['thumbnail_url']))
                                                        <img src="{{ $relatedVideo['thumbnail_url'] }}" class="card-img-top" alt="{{ $relatedVideo['title'] ?? 'Video relacionado' }}">
                                                    @endif
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $relatedVideo['title'] ?? 'Sin título' }}</h5>
                                                        <a href="{{ route('khan.videos', ['videoId' => $relatedVideo['id']]) }}" class="btn btn-sm btn-outline-success">Ver video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                
                                @if(isset($video['download_urls']))
                                    <h3 class="mt-4">Descargas disponibles</h3>
                                    <div class="list-group">
                                        @foreach($video['download_urls'] as $quality => $url)
                                            <a href="{{ $url }}" class="list-group-item list-group-item-action" target="_blank">
                                                Descargar en calidad {{ $quality }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('khan.exercises') }}" class="btn btn-primary me-2">Ver ejercicios</a>
                <a href="{{ route('index') }}" class="btn btn-success">Volver al inicio</a>
            </div>
        </div>
    </div>
</div>
@endsection