let currentQuestionIndex = 0;
let totalPoints = 0;
let wrongAnswers = 0;
let questions = [];

document.addEventListener('DOMContentLoaded', function() {
    fetch('/questions')
        .then(response => response.json())
        .then(data => {
            questions = data;
            displayQuestion();
        });
});

function displayQuestion() {
    const quizContainer = document.getElementById('quiz-container');
    const question = questions[currentQuestionIndex];

    const questionHtml = `
        <div class="question">
            <img src="${question.img}" alt="Question Image" width="200">
            <h2>${question.question}</h2>
            <ul class="answers">
                ${question.answers.map((answer, index) => `
                    <li>
                        <input type="radio" name="answer" value="${index}" id="answer${index}">
                        <label for="answer${index}">${answer}</label>
                    </li>
                `).join('')}
            </ul>
        </div>
    `;

    quizContainer.innerHTML = questionHtml;
}

function nextQuestion() {
    const selectedAnswer = document.querySelector('input[name="answer"]:checked');
    if (!selectedAnswer) {
        alert('Por favor selecciona una respuesta');
        return;
    }

    const answerValue = parseInt(selectedAnswer.value);

    fetch('/check_answer', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            question_index: currentQuestionIndex,
            selected_answer: answerValue
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.correct) {
            totalPoints += data.points;
        } else {
            wrongAnswers += 1;
        }

        currentQuestionIndex += 1;
        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            displaySummary();
        }
    });
}

function displaySummary() {
    const quizContainer = document.getElementById('quiz-container');
    const summary = document.getElementById('summary');
    quizContainer.style.display = 'none';
    summary.style.display = 'block';

    const totalPointsElement = document.getElementById('total-points');
    const wrongAnswersElement = document.getElementById('wrong-answers');
    const totalPossiblePointsElement = document.getElementById('total-possible-points');

    totalPointsElement.textContent = `Puntos Totales: ${totalPoints}`;
    wrongAnswersElement.textContent = `Respuestas Incorrectas: ${wrongAnswers}`;
    totalPossiblePointsElement.textContent = `Puntos Posibles: ${questions.reduce((sum, question) => sum + question.points, 0)}`;
}
