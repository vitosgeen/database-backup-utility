<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'Laravel App' }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top left, #00425A, #002E47 70%);
            color: #ffffff;
        }

        .icon-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.75rem;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .feature-card {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1rem;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: #4ade80;
        }

        .hero-icon {
            font-size: 9rem;
            color: #0dcaf0;
            background: linear-gradient(145deg, rgba(13, 202, 240, 0.15), rgba(13, 202, 240, 0.05));
            padding: 2rem;
            border-radius: 1.5rem;
            display: inline-block;
            box-shadow: 0 0 50px rgba(13, 202, 240, 0.3);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3 px-4 px-md-5">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                <i class="bi bi-hdd-network me-2"></i> DB Utility
            </a>
            <div class="d-flex">
                @guest
                <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn-outline-primary me-2" href="{{ route('register') }}">Register</a>
                @endguest
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 mb-3 text-muted">
        &copy; {{ date('Y') }} MyApp. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>