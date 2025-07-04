<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Estadísticas del Sistema</h1>
        
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Usuarios</h5>
                        <h2 class="text-primary">{{ $stats['total_usuarios'] }}</h2>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Alumnos</h5>
                        <h2 class="text-success">{{ $stats['total_alumnos'] }}</h2>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Gestores</h5>
                        <h2 class="text-warning">{{ $stats['total_gestores'] }}</h2>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Administradores</h5>
                        <h2 class="text-danger">{{ $stats['total_admins'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
        </div>
    </div>
</body>
</html>