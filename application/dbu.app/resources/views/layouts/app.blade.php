<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    <title>{{ $title ?? 'Laravel App' }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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