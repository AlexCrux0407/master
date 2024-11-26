<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página de Hábitos')</title>
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Ajustes de la barra lateral */
        .sidebar {
            width: 300px;
            height: 100vh;
            position: fixed;
            top: 0;
            right: -300px; /* Oculto fuera de la pantalla */
            background-color: #f8f9fa;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease-in-out;
            z-index: 1050;
        }

        .sidebar.active {
            right: 0; /* Aparece desde el lado derecho */
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1049;
        }

        .overlay.active {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  bg-success">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active " href="{{ route('index') }}">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('actividades') }}">ACTIVIDADES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('progreso') }}">PROGRESO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="configuracion-link">CONFIGURACIÓN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="p-4">
            <h5 class="text-primary">Configuración</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center">
                    <a class="fa fa-user-circle me-2 "  href="{{route('informacionUsuario')}}" ></a> Ajuste de Perfil
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <i class="fa fa-bell me-2"></i> Notificaciones
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <i class="fa fa-lock me-2"></i> Privacidad
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <i class="fa fa-language me-2"></i> Idioma
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <i class="fa fa-info-circle me-2"></i> Información de la Cuenta
                </li>
            </ul>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Main Content -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <script>
        const configuracionLink = document.getElementById('configuracion-link');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        // Abrir la barra lateral
        configuracionLink.addEventListener('click', (e) => {
            e.preventDefault(); // Evitar navegación
            sidebar.classList.add('active');
            overlay.classList.add('active');
        });

        // Cerrar la barra lateral
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
</body>
</html>
