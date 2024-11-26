@extends('layouts.PlantillaBase')

@section('title', 'Página de Hábitos')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">Actualizar Información de Usuario</h2>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('ActualizarUsuario', ['id' => session('usuario_id')]) }}" method="POST" id="updateForm">
                @csrf
                @method('PUT')

          

     

                <!-- Campo Nombre de Usuario -->
                <div class="mb-4">
                    <label for="nombreUsuario" class="form-label">Nuevo Nombre de Usuario</label>
                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" value="{{ session('nombreUsuario') }}" required>
                    <div class="invalid-feedback">
                        El nombre de usuario es obligatorio.
                    </div>
                </div>

                <!-- Botón de Enviar -->
                <button type="submit" class="btn btn-primary w-100" id="submitBtn">Actualizar</button>
            </form>
            
            <!-- Mostrar los valores de los campos -->
            <div class="mt-5">
                <h3>Valores Actuales:</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID Usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Correo Electrónico</th>
                            <th scope="col">Nombre de Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ session('usuario_id') }}</td>
                            <td>{{ session('nombre') }}</td>
                            <td>{{ session('apellido') }}</td>
                            <td>{{ session('correo') }}</td>
                            <td>{{ session('nombreUsuario') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

