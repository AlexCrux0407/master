@extends('layouts.PlantillaBase')

@section('title', 'Quiz de Naturaleza')

@section('content')
<div class="section center">
    <h2>Quiz de Naturaleza</h2>
    <form action="{{ route('quiz.result') }}" method="POST">
        @csrf

        <!-- Pregunta 1 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta1.png') }}" alt="Pregunta 1" class="question-image">
            <p>¿Qué deberíamos hacer con las botellas de plástico usadas?</p>
            <label><input type="radio" name="question1" value="a"> Tirarlas al contenedor general</label><br>
            <label><input type="radio" name="question1" value="b"> Reciclarlas</label><br>
            <label><input type="radio" name="question1" value="c"> Quemarlas</label><br>
        </div>

        <!-- Pregunta 2 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta2.png') }}" alt="Pregunta 2" class="question-image">
            <p>¿Qué podemos hacer para reducir el volumen de una botella plástica antes de reciclarla?</p>
            <label><input type="radio" name="question2" value="a"> Dejarla como está</label><br>
            <label><input type="radio" name="question2" value="b"> Aplastarla</label><br>
            <label><input type="radio" name="question2" value="c"> Cortarla en pedazos pequeños</label><br>
        </div>

        <!-- Pregunta 3 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta3.png') }}" alt="Pregunta 3" class="question-image">
            <p>¿De qué color es el contenedor para residuos orgánicos?</p>
            <label><input type="radio" name="question3" value="a"> Verde</label><br>
            <label><input type="radio" name="question3" value="b"> Azul</label><br>
            <label><input type="radio" name="question3" value="c"> Marrón</label><br>
        </div>

        <!-- Pregunta 4 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta4.png') }}" alt="Pregunta 4" class="question-image">
            <p>¿Qué sucede si dejamos el grifo abierto mientras nos cepillamos los dientes?</p>
            <label><input type="radio" name="question4" value="a"> Ahorramos agua</label><br>
            <label><input type="radio" name="question4" value="b"> Desperdiciamos mucha agua</label><br>
            <label><input type="radio" name="question4" value="c"> Nada</label><br>
        </div>

        <!-- Pregunta 5 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta5.png') }}" alt="Pregunta 5" class="question-image">
            <p>¿Qué animal está en peligro debido a las bolsas de plástico en el océano?</p>
            <label><input type="radio" name="question5" value="a"> Tortugas marinas</label><br>
            <label><input type="radio" name="question5" value="b"> Elefantes</label><br>
            <label><input type="radio" name="question5" value="c"> Gatos</label><br>
        </div>

        <!-- Pregunta 6 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta6.png') }}" alt="Pregunta 6" class="question-image">
            <p>¿Qué se debe hacer con el papel usado?</p>
            <label><input type="radio" name="question6" value="a"> Quemarlo</label><br>
            <label><input type="radio" name="question6" value="b"> Reciclarlo</label><br>
            <label><input type="radio" name="question6" value="c"> Tirarlo al suelo</label><br>
        </div>

        <!-- Pregunta 7 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta7.png') }}" alt="Pregunta 7" class="question-image">
            <p>¿Qué es el compostaje?</p>
            <label><input type="radio" name="question7" value="a"> Una técnica para reciclar plástico</label><br>
            <label><input type="radio" name="question7" value="b"> Un proceso para convertir residuos orgánicos en
                abono</label><br>
            <label><input type="radio" name="question7" value="c"> Una forma de ahorrar energía eléctrica</label><br>
        </div>

        <!-- Pregunta 8 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta8.png') }}" alt="Pregunta 8" class="question-image">
            <p>¿Cuál de estos materiales tarda más tiempo en descomponerse?</p>
            <label><input type="radio" name="question8" value="a"> Papel</label><br>
            <label><input type="radio" name="question8" value="b"> Vidrio</label><br>
            <label><input type="radio" name="question8" value="c"> Restos de comida</label><br>
        </div>

        <!-- Pregunta 9 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta9.png') }}" alt="Pregunta 9" class="question-image">
            <p>¿Qué fuente de energía es renovable?</p>
            <label><input type="radio" name="question9" value="a"> Carbón</label><br>
            <label><input type="radio" name="question9" value="b"> Petróleo</label><br>
            <label><input type="radio" name="question9" value="c"> Energía solar</label><br>
        </div>

        <!-- Pregunta 10 -->
        <div class="question-block">
            <img src="{{ asset('images/pregunta10.png') }}" alt="Pregunta 10" class="question-image">
            <p>¿Por qué es importante plantar árboles?</p>
            <label><input type="radio" name="question10" value="a"> Producen dióxido de carbono</label><br>
            <label><input type="radio" name="question10" value="b"> Absorben dióxido de carbono y producen
                oxígeno</label><br>
            <label><input type="radio" name="question10" value="c"> Destruyen la tierra</label><br>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Respuestas</button>
    </form>
</div>

<link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
@endsection