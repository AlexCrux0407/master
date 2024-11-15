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
        <form method="post" action="{{ route('enviar') }}">
            @csrf
            <input type="text" name="nombreUsuario" placeholder="Nombre de Usuario"value={{old('nombreUsuario')}} > 
            <small class="fst-italic text-danger">{{$errors->first('nombreUsuario')}}</small>

            <input type="text" name="txtnombre" placeholder="Nombre" value={{old('txtnombre')}} >
            <small class="fst-italic text-danger">{{$errors->first('txtnombre')}}</small>

            <input type="text" name="txtapellido" placeholder="Apellidos" value={{old('txtapellido')}} >
            <small class="fst-italic text-danger">{{$errors->first('txtapellido')}}</small>

            <input type="email" name="correo" placeholder="Correo Electrónico" value={{old('correo')}} >
            <small class="fst-italic text-danger">{{$errors->first('correo')}}</small>

            <input type="password" name="password" placeholder="Contraseña"  >
            <small class="fst-italic text-danger">{{$errors->first('password')}}</small>
            
            
            <button type="submit">Registrar</button>
        </form>
        
        <a href="{{ route('login') }}">Ya tengo una cuenta</a>
    </div>
</body>
</html>
