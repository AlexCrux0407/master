from flask import Flask, render_template, request, redirect, url_for, flash, session
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
    return render_template('estadisticas.html')

@app.route('/metas')
def metas():
    if 'username' not in session:
        return redirect(url_for('login'))
    return render_template('metas.html')

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

if __name__ == '__main__':
    app.run(debug=True)
