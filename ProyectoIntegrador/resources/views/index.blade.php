@extends('layouts.PlantillaBase')

@section('title', 'Página de Hábitos')

@section('content')
<div class="section">
    <h2>NOVEDADES</h2>
    <p><i class="fas fa-bullhorn"></i> ¡Nueva actualización de la web con nuevas actividades!</p>
    <p><i class="fas fa-thumbs-up"></i> ¡Ahora tenemos página de Facebook! Ve a seguirnos</p>
    <p><i class="fas fa-smile"></i> No olviden seguirnos en nuestras redes sociales</p>
    <div class="image-container small-margin">
        <img src="{{ asset('images/nino-feliz.png') }}" alt="Niño feliz">
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
        <img src="{{ asset('images/animal-amigable.png') }}" alt="Animal amigable">
    </div>
</div>

<!-- Mostrar mensaje de éxito con SweetAlert si existe -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif
@endsection


