@extends('layouts.PlantillaBase')

@section('title', 'Ranking de Usuarios')

@section('content')
<div class="section center">
    <h2>Ranking de Usuarios</h2>
    <p>Consulta los puntajes acumulados por los usuarios.</p>

    <!-- Imagen ilustrativa encima de la tabla -->
    <div class="image-container">
        <img src="{{ asset('images/trophy.png') }}" alt="Tortuga con trofeo" class="illustration-img">
    </div>

    <!-- Tabla de ranking -->
    <table class="ranking-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Puntos Totales</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rankings as $index => $ranking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ranking->usuario->nombreUsuario }}</td>
                    <td>{{ $ranking->total_points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('progreso') }}" class="back-link">Volver a Progreso</a>
</div>

<style>
    /* Estilo de la tabla */
    .ranking-table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        text-align: center;
        font-family: 'Arial', sans-serif;
    }

    .ranking-table th, .ranking-table td {
        border: 1px solid #ddd;
        padding: 12px;
    }

    .ranking-table th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
    }

    .ranking-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .ranking-table tr:nth-child(odd) {
        background-color: #e3f2fd;
    }

    .ranking-table tr:hover {
        background-color: #d1ecf1;
    }

    .ranking-table td {
        font-size: 16px;
    }

    /* Imagen ilustrativa */
    .image-container {
        margin: 10px auto;
        text-align: center;
    }

    .illustration-img {
        width: 150px; /* Tamaño reducido de la imagen */
        height: auto;
    }

    /* Estilo del enlace */
    .back-link {
        display: inline-block;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
        font-size: 16px;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>
@endsection
