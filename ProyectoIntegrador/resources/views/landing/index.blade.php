<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EcoCardenal | Aprende Jugando</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            margin: 0;
            background: #fefae0;
            color: #333;
        }

        header {
            background: linear-gradient(135deg, #3a5a40, #588157);
            color: #fff;
            text-align: center;
            padding: 100px 20px 60px;
            position: relative;
            border-bottom-left-radius: 60px;
            border-bottom-right-radius: 60px;
        }

        header h1 {
            font-size: 3.2rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: auto;
        }

        .hero {
            text-align: center;
            padding: 60px 20px 30px;
        }

        .hero img {
            max-width: 200px;
            margin-bottom: 20px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .hero h2 {
            font-size: 2rem;
            color: #3a5a40;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 30px;
            color: #555;
        }

        .cta a {
            display: inline-block;
            background: #bc6c25;
            color: #fff;
            padding: 16px 36px;
            font-size: 18px;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            margin: 0 10px;
        }

        .cta a:hover {
            background: #dda15e;
            color: #333;
            transform: scale(1.05);
        }

        .features {
            background: #fff;
            padding: 70px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .feature {
            background: #fefae0;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-10px);
        }

        .feature h3 {
            font-size: 1.5rem;
            margin-bottom: 12px;
            color: #bc6c25;
        }

        .feature p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
        }

        footer {
            background: #283618;
            color: #fff;
            text-align: center;
            padding: 40px 20px;
            font-size: 0.95rem;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
        }
    </style>
</head>

<body>

    <header>
        <h1>EcoCardenal</h1>
        <p>Una plataforma donde niños y niñas aprenden a cuidar el planeta jugando y compartiendo en familia.</p>
    </header>

    <section class="hero">
        <img src="{{ asset('images/mascota.png') }}" alt="Mascota EcoCardenal" />
        <h2>Aprender a cuidar el planeta nunca fue tan divertido</h2>
        <p>Descubre aventuras interactivas, cuentos ecológicos y retos familiares diseñados para niños de 6 a 12 años.
        </p>
        <div class="cta">
            <a href="{{ route('registrar') }}">🌿 Crear cuenta gratuita</a>
            <a href="{{ route('login') }}">Iniciar sesión</a>
        </div>
    </section>

    <section class="features">
        <div class="feature">
            <h3>🎮 Juegos Interactivos</h3>
            <p>Explora mundos donde reciclar, cuidar el agua y proteger la fauna son misiones emocionantes.</p>
        </div>
        <div class="feature">
            <h3>📖 Cuentos Ambientales</h3>
            <p>Historias ilustradas que fomentan el amor por la naturaleza y los valores ecológicos.</p>
        </div>
        <div class="feature">
            <h3>🏆 Retos en Familia</h3>
            <p>Actividades semanales para compartir en casa mientras cuidas el medio ambiente.</p>
        </div>
    </section>

    <footer>
        <p>© 2025 EcoCardenal | Desarrollado por estudiantes de la Universidad Politécnica de Querétaro</p>
    </footer>

</body>

</html>
