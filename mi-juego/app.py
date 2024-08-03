from flask import Flask, render_template, jsonify, request

app = Flask(__name__)

questions = [
    { 
        "question": "¿Cómo se llama el lugar donde viven muchos animales y plantas?",
        "img": "images/pregunta1.png.png", 
        "answers": ["Fábrica", "Bosque", "Oficina"], 
        "correct": 1,
        "points": 50 
    },
    { 
        "question": "¿Por qué es importante apagar las luces cuando no las estamos usando?",
        "img": "images/pregunta2.png.png", 
        "answers": ["Para ahorrar energía y cuidar el planeta", "Para que la casa esté más oscura", "Para que las luces no se rompan"], 
        "correct": 0,
        "points": 50 
    },
    { 
        "question": "¿Qué es el calentamiento global?",
        "img": "images/pregunta3.png.png", 
        "answers": ["Es cuando la temperatura de la Tierra disminuye debido a la lluvia y la nieve", "Es cuando la temperatura de la Tierra se mantiene igual y no cambia con el tiempo", "Es cuando la temperatura de la Tierra aumenta debido a la acumulación de gases de efecto invernadero en la atmósfera"], 
        "correct": 2,
        "points": 100 
    },
    { 
        "question": "¿Qué es la atmósfera y cuál es su función?",
        "img": "images/pregunta4.png.png", 
        "answers": ["Es una capa de gases que rodea la Tierra y su función es protegernos de los rayos del sol y mantener el calor del planeta.", "Es una capa de agua alrededor de la Tierra y su función es mantener el planeta húmedo", "Es una capa de rocas y minerales que cubre la superficie de la Tierra y su función es proporcionar suelo para las plantas"], 
        "correct": 0,
        "points": 100 
    },
    { 
        "question": "¿Cuál de los siguientes animales se encuentran en peligro de extinción?",
        "img": "images/pregunta5.png.png", 
        "answers": ["Tigre de Bengala, chimpancé, ajolote, mandril, Oso polar.", "Vaca, caballos, perro doméstico, gato doméstico y oso panda", "Todos los anteriores"], 
        "correct": 2,
        "points": 100 
    },
    { 
        "question": "¿Sabes cuántos árboles deben ser talados para producir una tonelada de papel?",
        "img": "images/pregunta6.png.png", 
        "answers": ["39 árboles", "150 árboles", "17 árboles"], 
        "correct": 1,
        "points": 150 
    },
    { 
        "question": "¿Qué es la deforestación y cómo afecta a las personas y a los animales?",
        "img": "images/pregunta7.png.png", 
        "answers": ["Es el crecimiento natural de los bosques que ayuda a aumentar la biodiversidad y proporciona recursos para las comunidades locales", "Es la quema controlada de bosques para crear nuevos espacios para la agricultura, lo que mejora la producción de alimentos", "Es la tala excesiva de árboles y afecta negativamente a las personas y animales al destruir sus hábitats y contribuir al cambio climático"], 
        "correct": 2,
        "points": 150 
    },
    { 
        "question": "Este ecosistema se caracteriza por tener árboles altos y densos que forman un dosel cerrado, con una gran variedad de plantas, animales e insectos. Recibe mucha lluvia durante el año, y la humedad es alta. Alberga una biodiversidad increíble, incluyendo especies como jaguares, monos, ranas venenosas. ¿Qué ecosistema es?",
        "img": "images/pregunta8.png.png", 
        "answers": ["Selva", "Desierto", "Tundra"], 
        "correct": 0,
        "points": 150 
    },
    { 
        "question": "¿Qué significa cada una de las tres R: Reducir, Reutilizar y Reciclar?",
        "img": "images/pregunta9.png.png", 
        "answers": ["Reducir: Tirar menos basura a la calle. Reutilizar: Comprar productos nuevos. Reciclar: Separar la basura en diferentes contenedores.", "Reducir: Comprar más cosas nuevas. Reutilizar: Usar productos una sola vez. Reciclar: Quemar basura para deshacerse de ella.", "Reducir: Usar menos recursos y generar menos residuos desde el principio. Reutilizar: Usar objetos o materiales varias veces antes de desecharlos. Reciclar: Transformar materiales usados en nuevos productos."], 
        "correct": 2,
        "points": 200 
    },
    { 
        "question": "En 1876 se creó la primera área protegida de México, con el propósito de preservar los manantiales que abastecían de agua a la Ciudad de México. ¿Cuál es esta área?",
        "img": "images/pregunta10.png.png", 
        "answers": ["Desierto de los Leones", "Reserva de la Biósfera del Santuario de la Mariposa Monarca", "Reserva de la Biósfera de la Sierra Gorda"], 
        "correct": 0,
        "points": 200 
    }
]

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/questions', methods=['GET'])
def get_questions():
    return jsonify(questions)

@app.route('/check_answer', methods=['POST'])
def check_answer():
    data = request.get_json()
    question_index = data.get('question_index')
    selected_answer = data.get('selected_answer')
    correct = questions[question_index]['correct']
    is_correct = selected_answer == correct
    points = questions[question_index]['points'] if is_correct else 0
    return jsonify({"correct": is_correct, "correct_answer": correct, "points": points})

@app.route('/summary', methods=['POST'])
def summary():
    data = request.get_json()
    total_points = data.get('total_points')
    wrong_answers = data.get('wrong_answers')
    total_possible_points = sum(question['points'] for question in questions)
    return jsonify({
        "total_points": total_points,
        "wrong_answers": wrong_answers,
        "total_possible_points": total_possible_points
    })

if __name__ == '__main__':
    app.run(debug=True)
