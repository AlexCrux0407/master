@extends('layouts.PlantillaBase')

@section('title', 'Trivia - Quiz')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0 text-center">Quiz de Trivia</h2>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-center">
                        <span class="badge bg-info text-dark p-2 fs-6">{{ $amount }} preguntas</span>
                        <span class="badge bg-primary p-2 fs-6">{{ $category }}</span>
                        @if($difficulty != 'Any')
                            <span class="badge bg-{{ $difficulty == 'easy' ? 'success' : ($difficulty == 'medium' ? 'warning' : 'danger') }} p-2 fs-6">
                                {{ $difficulty }}
                            </span>
                        @endif
                    </div>
                    
                    <form action="{{ route('trivia.submit') }}" method="POST" id="quizForm">
                        @csrf
                        
                        @foreach($questions as $index => $question)
                            <div class="question-card p-4 mb-4 border rounded shadow-sm">
                                <h4 class="mb-3">{{ $index + 1 }}. {!! htmlspecialchars_decode($question['question']) !!}</h4>
                                
                                <div class="mb-3">
                                    <p class="mb-2"><strong>Categoría:</strong> {{ $question['category'] }}</p>
                                </div>
                                
                                @if($question['type'] == 'multiple')
                                    @php
                                        $answers = array_merge([$question['correct_answer']], $question['incorrect_answers']);
                                        shuffle($answers);
                                    @endphp
                                    
                                    <div class="list-group">
                                        @foreach($answers as $answer)
                                            <label class="list-group-item list-group-item-action d-flex align-items-center">
                                                <input type="radio" name="question_{{ $index + 1 }}" value="{{ $answer }}" class="me-3" required>
                                                <span>{!! htmlspecialchars_decode($answer) !!}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="list-group">
                                        <label class="list-group-item list-group-item-action d-flex align-items-center">
                                            <input type="radio" name="question_{{ $index + 1 }}" value="True" class="me-3" required>
                                            <span>Verdadero</span>
                                        </label>
                                        <label class="list-group-item list-group-item-action d-flex align-items-center">
                                            <input type="radio" name="question_{{ $index + 1 }}" value="False" class="me-3" required>
                                            <span>Falso</span>
                                        </label>
                                    </div>
                                @endif
                                
                                <div class="mt-2 text-muted">
                                    <small>Dificultad: 
                                        <span class="badge bg-{{ $question['difficulty'] == 'easy' ? 'success' : ($question['difficulty'] == 'medium' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($question['difficulty']) }}
                                        </span>
                                    </small>
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-check-circle me-2"></i> Enviar Respuestas
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('trivia.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Cancelar Quiz
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .question-card {
        transition: all 0.3s ease;
    }
    .question-card:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection