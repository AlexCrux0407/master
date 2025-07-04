<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1>Panel de Administración</h1>
                <p>Bienvenido, {{ session('nombre') }} {{ session('apellido') }} - Administrador</p>
                <p>Rol: {{ session('rol') }}</p>
                <p>Correo: {{ session('correo') }}</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title">Gestionar Usuarios</h5>
                        <p class="card-text">Administra usuarios y sus roles</p>
                        <a href="{{ route('admin.usuarios') }}" class="btn btn-success">Gestionar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Estadísticas</h5>
                        <p class="card-text">Ver estadísticas del sistema</p>
                        <a href="{{ route('admin.estadisticas') }}" class="btn btn-info">Ver Stats</a>
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
        </div>
    </div>
</body>
</html>