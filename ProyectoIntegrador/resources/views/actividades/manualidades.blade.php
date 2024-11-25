@extends('layouts.PlantillaBase')

@section('title', 'Manualidades')

@section('content')

<div class="section center">
    <h2>Manualidades Reciclables</h2>
    <p>Descubre cómo reutilizar materiales reciclables para crear objetos útiles y divertidos.</p>

    <div class="manualidad-block">
        <h3>1. Alcancía con Botellas de Plástico</h3>
        <p>Transforma una botella de plástico en una práctica hucha.</p>
        <h4>Materiales:</h4>
        <ul>
            <li>1 botella de plástico</li>
            <li>Pintura acrílica (opcional)</li>
            <li>Tijeras</li>
            <li>Cinta adhesiva decorativa</li>
        </ul>
        <h4>Pasos:</h4>
        <ol>
            <li>Recorta la parte superior de la botella para hacer una abertura donde caerán las monedas.</li>
            <li>Decora la botella con pintura y cinta adhesiva.</li>
            <li>Asegúrate de que la tapa esté bien cerrada para mantener las monedas seguras.</li>
        </ol>
        <a href="https://www.youtube.com/watch?v=75B8pGCk4Y4" target="_blank">Ver video del experimento</a>
    </div>

    <div class="manualidad-block">
        <h3>2. Macetas con Latas de Aluminio</h3>
        <p>Dale una nueva vida a las latas convirtiéndolas en macetas decorativas.</p>
        <h4>Materiales:</h4>
        <ul>
            <li>1 lata de aluminio</li>
            <li>Pintura en aerosol</li>
            <li>Tierra y una planta pequeña</li>
            <li>Punzón o clavo para hacer agujeros</li>
        </ul>
        <h4>Pasos:</h4>
        <ol>
            <li>Haz pequeños agujeros en la base de la lata para el drenaje del agua.</li>
            <li>Pinta la lata con el diseño de tu preferencia usando pintura en aerosol.</li>
            <li>Llena la lata con tierra y planta tu planta favorita.</li>
        </ol>
        <a href="https://www.youtube.com/watch?v=QRcBMVNE1z4" target="_blank">Ver video del experimento</a>
    </div>

    <div class="manualidad-block">
        <h3>3. Lámpara con Cartón y Papel</h3>
        <p>Crea una lámpara original y ecológica con cartón y papel reciclado.</p>
        <h4>Materiales:</h4>
        <ul>
            <li>Cartón reciclado</li>
            <li>Papel decorativo reciclado</li>
            <li>Tijeras o cúter</li>
            <li>Pegamento</li>
            <li>Una luz LED</li>
        </ul>
        <h4>Pasos:</h4>
        <ol>
            <li>Recorta el cartón en forma de base y estructura de la lámpara.</li>
            <li>Pega el papel decorativo sobre el cartón para darle color.</li>
            <li>Ensambla la estructura y coloca la luz LED en el interior.</li>
        </ol>
        <a href="https://www.youtube.com/watch?v=GwujtQajDy4&list=PL8Z2847EZSQpoWoa7kWCnqUi_MAgP8OHw" target="_blank">Ver video del experimento</a>
    </div>

    <a href="{{ route('actividades') }}" class="back-link">Volver a Actividades</a>
</div>
<link rel="stylesheet" href="{{ asset('css/manualidades.css') }}">

@endsection
