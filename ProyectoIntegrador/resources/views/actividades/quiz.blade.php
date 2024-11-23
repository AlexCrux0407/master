@extends('layouts.PlantillaBase')

@section('title', 'Realiza un Quiz')

@section('content')
<div class="section center">
    <h2>Realiza un Quiz</h2>
    <p>Contesta las siguientes preguntas sobre naturaleza, reciclaje y cuidado del medio ambiente. ¡Buena suerte!</p>

    <form action="{{ route('quiz.result') }}" method="POST">
        @csrf
    
        <div class="question">
            <p><strong>1. ¿Cuál de los siguientes materiales es reciclable?</strong></p>
            <label>
                <input type="radio" name="question1" value="a"> A. Cáscaras de frutas
            </label><br>
            <label>
                <input type="radio" name="question1" value="b"> B. Botellas de plástico
            </label><br>
            <label>
                <input type="radio" name="question1" value="c"> C. Pilas usadas
            </label>
        </div>

  
        <div class="question">
            <p><strong>2. ¿Qué debemos hacer antes de tirar una botella de plástico al contenedor?</strong></p>
            <label>
                <input type="radio" name="question2" value="a"> A. Rellenarla con agua
            </label><br>
            <label>
                <input type="radio" name="question2" value="b"> B. Aplastarla para reducir su volumen
            </label><br>
            <label>
                <input type="radio" name="question2" value="c"> C. Tirarla con su tapa puesta
            </label>
        </div>

            <div class="question">
            <p><strong>3. ¿Qué color identifica el contenedor de residuos orgánicos?</strong></p>
            <label>
                <input type="radio" name="question3" value="a"> A. Azul
            </label><br>
            <label>
                <input type="radio" name="question3" value="b"> B. Verde
            </label><br>
            <label>
                <input type="radio" name="question3" value="c"> C. Marrón
            </label>
        </div>

        <div class="question">
            <p><strong>4. ¿Qué sucede si dejamos una luz encendida todo el día?</strong></p>
            <label>
                <input type="radio" name="question4" value="a"> A. No pasa nada, es normal
            </label><br>
            <label>
                <input type="radio" name="question4" value="b"> B. Gastamos más energía eléctrica y contaminamos más
            </label><br>
            <label>
                <input type="radio" name="question4" value="c"> C. Ayudamos a ahorrar energía
            </label>
        </div>

        <div class="question">
            <p><strong>5. ¿Qué animales están en peligro de extinción por la contaminación de los océanos?</strong></p>
            <label>
                <input type="radio" name="question5" value="a"> A. Tortugas marinas
            </label><br>
            <label>
                <input type="radio" name="question5" value="b"> B. Leones
            </label><br>
            <label>
                <input type="radio" name="question5" value="c"> C. Pingüinos de la Antártida
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Enviar Respuestas</button>
    </form>

    <a href="{{ route('index') }}" class="back-link">Volver a Actividades</a>
</div>
@endsection
