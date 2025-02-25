<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎵​ Music Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Fondo general */
        body {
            background: linear-gradient(135deg, #1f1c2c, #928dab);
            color: white;
        }

        /* Navbar Glassmorphism */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 10px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
            transition: color 0.3s ease;
        }
        .navbar-custom .navbar-brand:hover,
        .navbar-custom .nav-link:hover {
            color: #ffc107;
        }

        /* Footer estilizado */
        .footer {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
        }
        .footer a {
            color: #ffc107;
            text-decoration: none;
        }
        .footer a:hover {
            color: white;
        }

        /* Contenido principal */
        .main-content {
            padding-top: 70px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🎵​ Music Hub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="container main-content mt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer text-light">
        <div class="container">
            &copy; 2025 Fco. Javier Martín Mariscal | Todos los derechos reservados
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
