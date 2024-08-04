from flask import Flask, render_template, request, redirect, url_for, flash, session, jsonify
from flask_mysqldb import MySQL
from werkzeug.security import generate_password_hash, check_password_hash
import json

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
        "correct": 0,
        "points": 100
    },
    {
        "question": "¿Sabes cuántos árboles deben ser talados para producir una tonelada de papel?",
        "img": "images/pregunta6.png.png",
        "answers": ["39 árboles", "150 árboles", "17 árboles"],
        "correct": 2,
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
        "answers": ["Selva tropical", "Desierto", "Tundra"],
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

# Función para obtener metas aleatorias
def obtener_metas_aleatorias(user_id):
    cursor = mysql.connection.cursor()
    cursor.execute("""
        SELECT id, nombre, descripcion, beneficio_estimado 
        FROM metas 
        WHERE id NOT IN (SELECT meta_id FROM metas_completadas WHERE usuario_id = %s)
        ORDER BY RAND() LIMIT 5
    """, (user_id,))
    metas = cursor.fetchall()
    cursor.close()
    return metas

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

@app.route('/estadisticas')
def estadisticas():
    if 'username' not in session:
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

@app.route('/metas', methods=['GET', 'POST'])
def metas():
    if 'username' not in session:
        return redirect(url_for('login'))
    
    user_id = session['user_id']
    metas = obtener_metas_aleatorias(user_id)
    
    return render_template('metas.html', metas=metas)

@app.route('/completar_meta/<int:meta_id>', methods=['POST'])
def completar_meta(meta_id):
    if 'username' not in session:
        return redirect(url_for('login'))
    
    user_id = session['user_id']
    cursor = mysql.connection.cursor()
    
    # Verificar si la meta ya fue completada
    cursor.execute("SELECT * FROM metas_completadas WHERE usuario_id = %s AND meta_id = %s", (user_id, meta_id))
    meta_completada = cursor.fetchone()
    
    if not meta_completada:
        # Marcar meta como completada y actualizar puntos
        cursor.execute("INSERT INTO metas_completadas (usuario_id, meta_id) VALUES (%s, %s)", (user_id, meta_id))
        cursor.execute("UPDATE usuario SET puntos = puntos + (SELECT beneficio_estimado FROM metas WHERE id = %s) WHERE id = %s", (meta_id, user_id))
        mysql.connection.commit()
        flash('Meta completada y puntos actualizados', 'success')
    else:
        flash('Esta meta ya fue completada', 'info')
    
    cursor.close()
    return redirect(url_for('metas'))

@app.route('/actividades_completadas')
def actividades_completadas():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('actividades_completadas.html')

@app.route('/ranking')
def ranking():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('ranking.html')

@app.route('/logout')
def logout():
    session.pop('user_id', None)
    session.pop('username', None)
    flash('Cierre de sesión exitoso', 'success')
    return redirect(url_for('login'))

@app.route('/questions')
def get_questions():
    return jsonify(questions)

@app.route('/resumen_quiz', methods=['POST'])
def resumen_quiz():
    datos = request.get_json()
    print("Datos recibidos:", datos)  # Imprime los datos para depuración
    puntos_totales = datos['puntos_totales']
    respuestas_incorrectas = datos['respuestas_incorrectas']
    puntos_posibles_totales = datos['puntos_posibles_totales']
    return render_template('resumen_quiz.html', puntos_totales=puntos_totales, respuestas_incorrectas=respuestas_incorrectas, puntos_posibles_totales=puntos_posibles_totales)

if __name__ == '__main__':
    app.run(debug=True)
