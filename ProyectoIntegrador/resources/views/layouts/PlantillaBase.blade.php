<!-- resources/views/layouts/app.blade.php -->
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
</head>
<body>
    <div class="navbar">
        <a href="{{ route('index') }}">INICIO</a>
        <a href="{{ route('actividades') }}">ACTIVIDADES</a>
        <a href="{{ route('progreso') }}">PROGRESO</a>
        <a href="{{ route('configuracion') }}">CONFIGURACIÓN</a>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
