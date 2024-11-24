@extends('layouts.PlantillaBase')

@section('title', 'Actividades Completadas')

@section('content')
<div class="section center">
    <h2>Actividades Completadas</h2>
    <p>Consulta tus actividades y los puntos obtenidos.</p>

    @if ($activities->isEmpty())
        <p>No has completado ninguna actividad aún. ¡Empieza ahora!</p>
    @else
        <table class="activities-table">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Puntos</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ ucfirst($activity->activity_type) }}</td>
                        <td>{{ $activity->activity_name }}</td>
                        <td>{{ $activity->points }}</td>
                        <td>{{ \Carbon\Carbon::parse($activity->completed_at)->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('progreso') }}" class="back-link">Volver a Progreso</a>
</div>

<style>
    .activities-table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        text-align: center;
    }

    .activities-table th, .activities-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .activities-table th {
        background-color: #4CAF50;
        color: white;
    }

    .activities-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .activities-table tr:hover {
        background-color: #ddd;
    }

    .back-link {
        margin-top: 20px;
        color: #4CAF50;
        text-decoration: none;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>
@endsection
