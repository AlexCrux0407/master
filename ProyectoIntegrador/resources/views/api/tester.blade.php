@extends('layouts.PlantillaBase')

@section('title', 'Prueba de API')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Panel de autenticación -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Autenticación</h5>
                </div>
                <div class="card-body">
                    <div id="login-form" class="mb-3">
                        <div class="mb-3">
                            <label for="login" class="form-label">Usuario o Email</label>
                            <input type="text" class="form-control" id="login" placeholder="Nombre de usuario o email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña">
                        </div>
                        <button class="btn btn-success w-100" id="login-btn">Iniciar Sesión</button>
                    </div>
                    
                    <div id="user-info" class="d-none">
                        <div class="alert alert-success">
                            <p class="mb-0"><strong>Usuario autenticado:</strong></p>
                            <p id="user-name" class="mb-0"></p>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Token:</small>
                            <div class="bg-light p-2 rounded">
                                <code id="token-display" class="small"></code>
                            </div>
                        </div>
                        <button class="btn btn-outline-danger w-100" id="logout-btn">Cerrar Sesión</button>
                    </div>
                </div>
            </div>
            
            <!-- Panel de endpoints -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Endpoints</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action endpoint-link" data-endpoint="/activities">Listar Actividades</a>
                        <a href="#" class="list-group-item list-group-item-action endpoint-link" data-endpoint="/activities/1">Detalle de Actividad</a>
                        <a href="#" class="list-group-item list-group-item-action endpoint-link" data-endpoint="/activities/stats">Estadísticas de Actividades</a>
                        <a href="#" class="list-group-item list-group-item-action endpoint-link" data-endpoint="/ranking/top">Top 3 Ranking</a>
                        <a href="#" class="list-group-item list-group-item-action endpoint-link auth-required" data-endpoint="/user/activities">Mis Actividades</a>
                        <a href="#" class="list-group-item list-group-item-action endpoint-link auth-required" data-endpoint="/user/progress">Mi Progreso</a>
                        <a href="#" class="list-group-item list-group-item-action endpoint-link auth-required" data-endpoint="/user/achievements">Mis Logros</a>
                        <a href="#" class="list-group-item list-group-item-action endpoint-link auth-required" data-endpoint="/ranking/me">Mi Posición</a>
                        <a href="#" class="list-group-item list-group-item-action endpoint-link" data-endpoint="/test">Test de API</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <!-- Panel de respuesta -->
            <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Respuesta API</h5>
                    <span id="request-url" class="badge bg-light text-dark"></span>
                </div>
                <div class="card-body">
                    <div class="p-3 bg-light rounded">
                        <pre><code id="response-data" class="language-json">// La respuesta de la API aparecerá aquí</code></pre>
                    </div>
                    
                    <!-- Sección para completar actividad -->
                    <div id="complete-activity-section" class="mt-4 d-none">
                        <hr>
                        <h5>Completar una actividad</h5>
                        <form id="complete-activity-form">
                            <div class="mb-3">
                                <label for="activity-type" class="form-label">Tipo de actividad</label>
                                <select class="form-select" id="activity-type">
                                    <option value="quiz">Quiz</option>
                                    <option value="game">Juego</option>
                                    <option value="trivia">Trivia</option>
                                    <option value="manualidades">Manualidades</option>
                                    <option value="historias">Historias</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="activity-name" class="form-label">Nombre de la actividad</label>
                                <input type="text" class="form-control" id="activity-name" placeholder="Quiz de Naturaleza">
                            </div>
                            <div class="mb-3">
                                <label for="activity-points" class="form-label">Puntos</label>
                                <input type="number" class="form-control" id="activity-points" value="5" min="1" max="100">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                    
                    <!-- Sección para análisis de sentimiento -->
                    <div id="sentiment-analysis-section" class="mt-4 d-none">
                        <hr>
                        <h5>Análisis de Sentimiento</h5>
                        <form id="sentiment-form">
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comentario</label>
                                <textarea class="form-control" id="comment" rows="3" placeholder="Escribe un comentario..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Analizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/themes/prism.min.css">
<style>
    pre {
        max-height: 400px;
        overflow-y: auto;
    }
    
    .endpoint-link.auth-required {
        position: relative;
    }
    
    .endpoint-link.auth-required::after {
        content: "🔒";
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('public/js/api-client.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/components/prism-json.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar cliente API
        const apiClient = new EcoAppApiClient('/api/v1'); // Aseguramos que use el prefijo v1
        
        // Comprobar si hay token guardado
        const savedToken = localStorage.getItem('eco_app_token');
        if (savedToken) {
            apiClient.setToken(savedToken);
            checkAuthStatus();
        }
        
        // Manejar inicio de sesión
        document.getElementById('login-btn').addEventListener('click', async function() {
            const login = document.getElementById('login').value;
            const password = document.getElementById('password').value;
            
            if (!login || !password) {
                alert('Por favor, introduce usuario y contraseña');
                return;
            }
            
            try {
                const response = await apiClient.login(login, password);
                updateResponseDisplay(response);
                checkAuthStatus();
            } catch (error) {
                updateResponseDisplay({ error: error.message });
            }
        });
        
        // Manejar cierre de sesión
        document.getElementById('logout-btn').addEventListener('click', async function() {
            try {
                const response = await apiClient.logout();
                updateResponseDisplay(response);
                document.getElementById('login-form').classList.remove('d-none');
                document.getElementById('user-info').classList.add('d-none');
            } catch (error) {
                updateResponseDisplay({ error: error.message });
            }
        });
        
        // Manejar clics en endpoints
        document.querySelectorAll('.endpoint-link').forEach(link => {
            link.addEventListener('click', async function(e) {
                e.preventDefault();
                
                const endpoint = this.dataset.endpoint;
                const authRequired = this.classList.contains('auth-required');
                
                // Verificar autenticación si es necesario
                if (authRequired && !apiClient.token) {
                    alert('Debes iniciar sesión para acceder a este endpoint');
                    return;
                }
                
                // Mostrar/ocultar formularios especiales
                document.getElementById('complete-activity-section').classList.add('d-none');
                document.getElementById('sentiment-analysis-section').classList.add('d-none');
                
                if (endpoint === '/user/activities/complete') {
                    document.getElementById('complete-activity-section').classList.remove('d-none');
                    return;
                } else if (endpoint === '/sentiment-analysis') {
                    document.getElementById('sentiment-analysis-section').classList.remove('d-none');
                    return;
                }
                
                // Realizar petición
                document.getElementById('request-url').textContent = endpoint;
                
                try {
                    let response;
                    
                    // Seleccionar método según el endpoint
                    switch(endpoint) {
                        case '/activities':
                            response = await apiClient.getActivities();
                            break;
                        case '/activities/1':
                            response = await apiClient.getActivity(1);
                            break;
                        case '/activities/stats':
                            response = await apiClient.getActivityStats();
                            break;
                        case '/ranking/top':
                            response = await apiClient.getTopRanking();
                            break;
                        case '/user/activities':
                            response = await apiClient.getUserActivities();
                            break;
                        case '/user/progress':
                            response = await apiClient.getUserProgress();
                            break;
                        case '/user/achievements':
                            response = await apiClient.getUserAchievements();
                            break;
                        case '/ranking/me':
                            response = await apiClient.getUserRanking();
                            break;
                        case '/test':
                            response = await fetch('/api/test').then(r => r.json());
                            break;
                        default:
                            response = await apiClient.request(endpoint);
                    }
                    
                    updateResponseDisplay(response);
                } catch (error) {
                    updateResponseDisplay({ error: error.message });
                }
            });
        });
        
        // Manejar envío del formulario de completar actividad
        document.getElementById('complete-activity-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const activityData = {
                activity_type: document.getElementById('activity-type').value,
                activity_name: document.getElementById('activity-name').value,
                points: parseInt(document.getElementById('activity-points').value)
            };
            
            try {
                const response = await apiClient.completeActivity(activityData);
                updateResponseDisplay(response);
            } catch (error) {
                updateResponseDisplay({ error: error.message });
            }
        });
        
        // Manejar envío del formulario de análisis de sentimiento
        document.getElementById('sentiment-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const comment = document.getElementById('comment').value;
            
            if (!comment) {
                alert('Por favor, introduce un comentario');
                return;
            }
            
            try {
                const response = await apiClient.analyzeSentiment(comment);
                updateResponseDisplay(response);
            } catch (error) {
                updateResponseDisplay({ error: error.message });
            }
        });
        
        // Comprobar estado de autenticación
        async function checkAuthStatus() {
            if (apiClient.token) {
                try {
                    const response = await apiClient.getMe();
                    
                    if (response.success) {
                        document.getElementById('login-form').classList.add('d-none');
                        document.getElementById('user-info').classList.remove('d-none');
                        
                        const user = response.data;
                        document.getElementById('user-name').textContent = `${user.nombreUsuario} (${user.nombre} ${user.apellido})`;
                        
                        // Mostrar token parcial por seguridad
                        const token = apiClient.token;
                        const displayToken = token.substring(0, 10) + '...' + token.substring(token.length - 5);
                        document.getElementById('token-display').textContent = displayToken;
                    }
                } catch (error) {
                    apiClient.clearToken();
                }
            }
        }
        
        // Actualizar display de respuesta
        function updateResponseDisplay(response) {
            const jsonStr = JSON.stringify(response, null, 2);
            const responseElement = document.getElementById('response-data');
            responseElement.textContent = jsonStr;
            Prism.highlightElement(responseElement);
        }
    });
</script>
@endpush