<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="register-container">
        <h2>Crear Cuenta</h2>
        <form method="post" action="{{ route('registro') }}">
            @csrf
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="email" name="correo_electronico" placeholder="Correo Electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            <button type="submit">Registrar</button>
        </form>
        
        <a href="{{ route('login') }}">Ya tengo una cuenta</a>
    </div>
</body>
</html>
