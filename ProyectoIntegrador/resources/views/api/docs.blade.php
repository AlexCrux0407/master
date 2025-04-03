@extends('layouts.PlantillaBase')

@section('title', 'Documentación de la API')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar con índice -->
            <div class="bg-white p-4 rounded shadow-sm sticky-top" style="top: 6rem;">
                <h5 class="text-success mb-3">Contenido</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#introduccion">Introducción</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#autenticacion">Autenticación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#activities">Actividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#progreso">Progreso del Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ranking">Ranking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sentiment">Análisis de Sentimiento</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="col-md-9">
            <!-- Contenido principal -->
            <div class="bg-white p-5 rounded shadow-sm">
                <h1 class="text-success mb-4">Documentación de la API de EcoApp</h1>
                
                <section id="introduccion" class="mb-5">
                    <h2 class="mb-3">Introducción</h2>
                    <p>Esta API permite interactuar con el sistema de actividades ecológicas, gestionar el progreso del usuario y consultar rankings.</p>
                    
                    <h4>Base URL</h4>
                    <div class="bg-light p-3 mb-3 rounded">
                        <code>{{ url('/api/v1') }}</code>
                    </div>
                </section>
                
                <section id="autenticacion" class="mb-5">
                    <h2 class="mb-3">Autenticación</h2>
                    <p>La API utiliza Laravel Sanctum para autenticación mediante tokens. Debes incluir el token en las cabeceras HTTP de las solicitudes:</p>
                    
                    <div class="bg-light p-3 mb-4 rounded">
                        <code>Authorization: Bearer [tu_token]</code>
                    </div>
                    
                    <h4 class="mt-4">Registro de usuario</h4>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">POST</span>
                            <code>/auth/register</code>
                        </div>
                        <div class="card-body">
                            <h5>Parámetros:</h5>
                            <ul>
                                <li><code>nombreUsuario</code>: Nombre de usuario único</li>
                                <li><code>nombre</code>: Nombre real del usuario</li>
                                <li><code>apellido</code>: Apellido del usuario</li>
                                <li><code>correo</code>: Correo electrónico único</li>
                                <li><code>password</code>: Contraseña (mínimo 8 caracteres)</li>
                            </ul>
                            
                            <h5>Respuesta exitosa:</h5>
                            <pre><code class="language-json">{
  "success": true,
  "data": {
    "usuario": {
      "id": 1,
      "nombreUsuario": "eco_user",
      "nombre": "Juan",
      "apellido": "Pérez",
      "correo": "juan@ejemplo.com",
      "created_at": "2025-04-01T10:00:00.000000Z",
      "updated_at": "2025-04-01T10:00:00.000000Z"
    },
    "access_token": "1|LMPZxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "token_type": "Bearer"
  }
}</code></pre>
                        </div>
                    </div>
                    
                    <h4>Inicio de sesión</h4>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">POST</span>
                            <code>/auth/login</code>
                        </div>
                        <div class="card-body">
                            <h5>Parámetros:</h5>
                            <ul>
                                <li><code>login</code>: Nombre de usuario o correo electrónico</li>
                                <li><code>password</code>: Contraseña</li>
                            </ul>
                            
                            <h5>Respuesta exitosa:</h5>
                            <pre><code class="language-json">{
  "success": true,
  "data": {
    "usuario": {
      "id": 1,
      "nombreUsuario": "eco_user"
      // otros datos del usuario
    },
    "access_token": "1|LMPZxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "token_type": "Bearer"
  }
}</code></pre>
                        </div>
                    </div>
                    
                    <!-- Aquí continúan más endpoints de autenticación -->
                </section>
                
                <section id="activities" class="mb-5">
                    <h2 class="mb-3">Actividades</h2>
                    
                    <h4>Listar todas las actividades disponibles</h4>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary">GET</span>
                            <code>/activities</code>
                        </div>
                        <div class="card-body">
                            <h5>Respuesta exitosa:</h5>
                            <pre><code class="language-json">{
  "success": true,
  "data": [
    {
      "id": 1,
      "type": "quiz",
      "name": "Quiz de Naturaleza",
      "description": "Pon a prueba tus conocimientos sobre el medio ambiente",
      "points": 10,
      "image_url": "https://tudominio.com/images/pregunta1.png"
    }
    // más actividades...
  ]
}</code></pre>
                        </div>
                    </div>
                    
                    <!-- Aquí continúan más endpoints de actividades -->
                </section>
                
                <!-- Secciones adicionales para Progreso, Ranking, etc. -->
                
                <section id="progreso" class="mb-5">
                    <h2 class="mb-3">Progreso del Usuario</h2>
                    <!-- Endpoints de progreso -->
                </section>
                
                <section id="ranking" class="mb-5">
                    <h2 class="mb-3">Ranking</h2>
                    <!-- Endpoints de ranking -->
                </section>
                
                <section id="sentiment" class="mb-5">
                    <h2 class="mb-3">Análisis de Sentimiento</h2>
                    <!-- Endpoints de análisis de sentimiento -->
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/themes/prism.min.css">
<style>
    pre {
        background-color: #f8f9fa;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
    }
    
    code {
        font-family: 'Source Code Pro', monospace;
        font-size: 14px;
    }
    
    .sticky-top {
        z-index: 100;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/components/prism-json.min.js"></script>
@endpush