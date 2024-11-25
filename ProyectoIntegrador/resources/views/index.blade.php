@extends('layouts.PlantillaBase')

@section('title', 'Página de Hábitos')

@section('content')
<div class="section">
    <h2>NOVEDADES</h2>
    <ul>
        <li><i class="fas fa-bullhorn"></i> ¡Nueva actualización de la web con nuevas actividades!</li>
        <li><i class="fas fa-thumbs-up"></i> ¡Ahora tenemos página de Facebook! Ve a seguirnos</li>
        <li><i class="fas fa-smile"></i> No olviden seguirnos en nuestras redes sociales</li>
    </ul>
    <div class="image-container small-margin">
        <img src="{{ asset('images/nino-feliz.png') }}" alt="Niño feliz" style="filter: drop-shadow(3px 3px 5px rgba(0, 0, 0, 0.5));">
    </div>
</div>
<div class="section center">
    <h2>RECOMENDACIONES</h2>
    <p>Cumple tus objetivos diarios para ganar puntos y subir en el ranking semanal</p>
    <p><i class="fas fa-chart-line"></i></p>
    <a href="{{ route('ranking.index') }}" class="btn-link">IR AHÍ</a>
    <p>No olvides desconectar los dispositivos electrónicos mientras no los uses, recuerda que consumen energía aunque estén apagados</p>
    <p><i class="fas fa-lightbulb"></i></p>
    <div class="image-container small-margin">
        <img src="{{ asset('images/animal-amigable.png') }}" alt="Animal amigable" style="filter: drop-shadow(3px 3px 5px rgba(0, 0, 0, 0.5));">
    </div>
</div>

@if (session('exito'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Bienvenido/a!',
            text: '{{ session('exito') }}',
            imageUrl: "{{ asset('images/like.png') }}", 
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'Inicio exitoso',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif
@endsection
