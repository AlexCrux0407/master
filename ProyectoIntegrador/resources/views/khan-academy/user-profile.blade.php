@extends('layouts.PlantillaBase')

@section('title', 'Khan Academy - Perfil de Usuario')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0 text-center">Perfil de Usuario de Khan Academy</h2>
                </div>
                <div class="card-body">
                    <!-- Formulario de búsqueda -->
                    <form action="{{ route('khan.user-profile') }}" method="GET" class="mb-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Ingresa el nombre de usuario de Khan Academy" 
                                   name="username" value="{{ request('username') }}" required>
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </div>
                    </form>
                    
                    @if(request('username') && empty($profile))
                        <div class="alert alert-warning">
                            No se encontró ningún usuario con ese nombre. Verifica que sea correcto o intenta con otro.
                        </div>
                    @endif
                    
                    @if(!empty($profile))
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                @if(isset($profile['avatarSrc']))
                                    <img src="{{ $profile['avatarSrc'] }}" alt="Avatar de {{ $profile['nickname'] ?? 'Usuario' }}" 
                                         class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                                @endif
                                <h3>{{ $profile['nickname'] ?? 'Sin nombre' }}</h3>
                                <p class="text-muted">@{{ $profile['username'] ?? '' }}</p>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-header bg-light">
                                        <h4 class="mb-0">Información general</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            @if(isset($profile['bio']))
                                                <li class="list-group-item">
                                                    <strong>Biografía:</strong> {{ $profile['bio'] }}
                                                </li>
                                            @endif
                                            @if(isset($profile['points']))
                                                <li class="list-group-item">
                                                    <strong>Puntos:</strong> {{ number_format($profile['points']) }}
                                                </li>
                                            @endif
                                            @if(isset($profile['dateJoined']))
                                                <li class="list-group-item">
                                                    <strong>Fecha de registro:</strong> {{ \Carbon\Carbon::parse($profile['dateJoined'])->format('d/m/Y') }}
                                                </li>
                                            @endif
                                            @if(isset($profile['countVideosCompleted']))
                                                <li class="list-group-item">
                                                    <strong>Videos completados:</strong> {{ $profile['countVideosCompleted'] }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                
                                @if(isset($profile['badge']) && !empty($profile['badge']))
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <h4 class="mb-0">Insignias</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach($profile['badge'] as $badge)
                                                    <div class="col-md-4 col-6 text-center mb-3">
                                                        @if(isset($badge['iconSrc']))
                                                            <img src="{{ $badge['iconSrc'] }}" alt="{{ $badge['description'] ?? 'Insignia' }}" 
                                                                class="img-fluid mb-2" style="max-height: 60px;">
                                                        @endif
                                                        <p class="small mb-0">{{ $badge['description'] ?? 'Sin descripción' }}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        @if(isset($profile['kaid']) && $profile['kaid'])
                            <div class="text-center mt-4">
                                <a href="https://www.khanacademy.org/profile/{{ $profile['kaid'] }}" 
                                   class="btn btn-outline-primary" target="_blank">
                                    Ver perfil completo en Khan Academy
                                </a>
                            </div>
                        @endif
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