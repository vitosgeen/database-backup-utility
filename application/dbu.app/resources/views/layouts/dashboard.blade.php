<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    <title>Database Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">

    <style>
        body {
        font-family: 'Inter', sans-serif;
        background-color: #041018;
        color: #ffffff;
        }
        .sidebar {
        background-color: #062230;
        min-height: 100vh;
        padding-top: 2rem;
        }
        .sidebar a {
        color: #9cb3c9;
        text-decoration: none;
        padding: 0.75rem 1rem;
        display: block;
        border-radius: 0.5rem;
        margin-bottom: 0.5rem;
        }
        .sidebar a.active {
        background-color: #154c5d;
        color: #ffffff;
        font-weight: 600;
        }
        .dashboard-card {
        background-color: #092736;
        border-radius: 0.75rem;
        padding: 1.5rem;
        color: white;
        }
        .dashboard-card h6 {
        color: #9cb3c9;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
        }
        .dashboard-card h3 {
        font-size: 1.8rem;
        font-weight: 700;
        }
        .status-pill {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 500;
        }
        .status-success {
        background-color: #0d9488;
        color: white;
        }
        .status-failed {
        background-color: #334155;
        color: #94a3b8;
        }
        table {
        background-color: #092736;
        color: white;
        border-radius: 0.75rem;
        }
        th {
        color: #9cb3c9;
        }
    </style>
</head>
<body>
    <!-- Dashboard Header -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Control Panel</a>
            <div class="text-end">
                <span class="text-white me-3">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            </div>
            
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Include -->
            <div class="col-md-3 col-lg-2 sidebar">
                @include('layouts.partials.sidebar')
            </div>
            <!-- Page Content -->
            <main class="col-md-9 col-lg-10 ms-auto px-4 mt-4">
                @yield('content')
                <footer class="text-center mt-5 mb-3 text-light">
                    &copy; {{ date('Y') }} MyApp Dashboard
                </footer>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
