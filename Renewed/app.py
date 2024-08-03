from flask import Flask, render_template, request, redirect, url_for, flash, session, jsonify
from flask_mysqldb import MySQL
from werkzeug.security import generate_password_hash, check_password_hash

app = Flask(__name__)
app.secret_key = 'your_secret_key'

# Configuración de MySQL
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = '1917248zzz'
app.config['MYSQL_DB'] = 'integrador'
app.config['MYSQL_CURSORCLASS'] = 'DictCursor'

mysql = MySQL(app)

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
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('index.html')

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        
        cursor = mysql.connection.cursor()
        cursor.execute('SELECT * FROM usuario WHERE Nombre = %s', (username,))
        user = cursor.fetchone()
        cursor.close()
        
        if user and check_password_hash(user['contraseña'], password):
            session['user_id'] = user['id']
            session['username'] = user['Nombre']
            flash('Inicio de sesión exitoso', 'success')
            return redirect(url_for('index'))
        else:
            flash('Nombre de usuario o contraseña incorrectos', 'danger')
    
    return render_template('login.html')

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        correo_electronico = request.form['correo_electronico']
        
        hashed_password = generate_password_hash(password, method='pbkdf2:sha256')
        
        cursor = mysql.connection.cursor()
        try:
            cursor.execute('INSERT INTO usuario (Nombre, correo_electronico, contraseña) VALUES (%s, %s, %s)', 
                           (username, correo_electronico, hashed_password))
            mysql.connection.commit()
            flash('Registro exitoso. Ahora puedes iniciar sesión', 'success')
            return redirect(url_for('login'))
        except Exception as e:
            flash(f'Error al registrar: {str(e)}', 'danger')
        finally:
            cursor.close()
    
    return render_template('register.html')

@app.route('/dashboard')
def dashboard():
    if 'username' not in session:
        flash('Por favor inicia sesión primero', 'danger')
        return redirect(url_for('login'))
    
    return render_template('dashboard.html')

@app.route('/actividades')
def actividades():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('actividades.html')

@app.route('/progreso')
def progreso():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('progreso.html')

@app.route('/configuracion')
def configuracion():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('configuracion.html')

@app.route('/quiz')
def quiz():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('quiz.html')

@app.route('/juego')
def juego():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('juego.html')

@app.route('/manualidades')
def manualidades():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('manualidades.html')

@app.route('/experimentos')
def experimentos():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('experimentos.html')

@app.route('/historias')
def historias():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('historias.html')

@app.route('/logros')
def logros():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('logros.html')

@app.route('/videos')
def videos():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('videos.html')

@app.route('/guardar_progreso', methods=['POST'])
def guardar_progreso():
    if 'username' not in session:
        return redirect(url_for('login'))
    user_id = session['user_id']
    puntos = request.form['puntos']
    cursor = mysql.connection.cursor()
    cursor.execute('INSERT INTO progresos (id_usuario, puntos) VALUES (%s, %s)', (user_id, puntos))
    mysql.connection.commit()
    cursor.close()
    return jsonify({'success': True})

@app.route('/siguiente_pregunta/<int:index>', methods=['GET'])
def siguiente_pregunta(index):
    if index < len(questions):
        return jsonify(questions[index])
    else:
        return jsonify({'completed': True})
    
@app.route('/estadisticas')
def estadisticas():
    if 'username' not in session:
        flash('Por favor inicia sesión primero', 'danger')
        return redirect(url_for('login'))

    cursor = mysql.connection.cursor()
    query = """
    SELECT a.nombre AS nombre_actividad, p.cantidad AS puntos 
    FROM actividades a 
    JOIN puntuaciones p ON a.puntuaciones_id = p.id
    JOIN perfil_actividades pa ON a.id = pa.actividad_id
    JOIN perfil pf ON pa.Perfil_id = pf.id
    JOIN usuario u ON pf.usuario_id = u.id
    WHERE u.id = %s
    """
    cursor.execute(query, (session['user_id'],))
    stats = cursor.fetchall()
    cursor.close()

    return render_template('estadisticas.html', stats=stats)

if __name__ == '__main__':
    app.run(debug=True)
