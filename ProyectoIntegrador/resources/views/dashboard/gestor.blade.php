<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Gestor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1>Panel de Gestión - Docente/Padre</h1>
                <p>Bienvenido, {{ session('nombre') }} {{ session('apellido') }}</p>
                <p>Rol: {{ session('rol') }}</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestionar Actividades</h5>
                        <p class="card-text">Selecciona qué actividades mostrar a los alumnos</p>
                        <a href="{{ route('gestor.actividades') }}" class="btn btn-primary">Gestionar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Volver al inicio</h5>
                        <p class="card-text">Regresar a la plataforma principal</p>
                        <a href="{{ route('index') }}" class="btn btn-secondary">Ir al inicio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cerrar sesión</h5>
                        <p class="card-text">Salir del sistema</p>
                        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
