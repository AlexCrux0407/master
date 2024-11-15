<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="login-container">
        @if(session('exito'))
            <script>
                Swal.fire({
                    title: "¡Bien hecho!",
                    text: "{{ session('exito') }}",
                    icon: "success"
                });
            </script>
        @endif

        <h2>Iniciar Sesión</h2>
        <form method="POST" action="{{ route('iniciar') }}">
            @csrf
            <input type="text" name="username" placeholder="Nombre de usuario" >
            <small class="fst-italic text-danger">{{ $errors->first('username') }}</small>

            <input type="password" name="password" placeholder="Contraseña" >
            <small class="fst-italic text-danger">{{ $errors->first('password') }}</small>

            <button type="submit">Iniciar Sesión</button>

            @if($errors->has('login'))
                <p class="fst-italic text-danger">{{ $errors->first('login') }}</p>
            @endif
        </form>
        
        <a href="{{ route('registrar') }}">Crear una cuenta</a>
    </div>
</body>
</html>
