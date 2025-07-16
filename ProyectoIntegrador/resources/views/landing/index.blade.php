@extends('layouts.PlantillaBase')

@section('title', 'Bienvenido a EcoCárdenal')

@section('content')
<div class="container py-5 text-center">
    <h1 class="display-4 text-dark fw-bold mb-3">¡Bienvenido a <span class="text-success">EcoCárdenal!</span></h1>

    <p class="lead mb-4 text-secondary">
        Tu plataforma de atención al cliente y gestión ecológica.
        Únete para recibir soporte, ideas, noticias y mucho más.
    </p>

    <a href="{{ route('registrar') }}" class="btn btn-success btn-lg me-2 shadow">
        <i class="fa fa-user-plus me-1"></i> Crear cuenta gratuita
    </a>

    <a href="{{ route('login') }}" class="btn btn-outline-success btn-lg shadow">
        <i class="fa fa-sign-in-alt me-1"></i> Iniciar sesión
    </a>

    <hr class="my-5">

    <h3 class="mb-3 text-dark fw-semibold">¿Tienes dudas?</h3>
    <a href="{{ route('atencion.cliente') }}" class="btn btn-outline-secondary btn-lg shadow">
        <i class="fa fa-headset me-1"></i> Contactar soporte
    </a>
</div>
@endsection