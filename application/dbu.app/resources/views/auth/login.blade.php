@extends('layouts.app')

@section('content')
<style>
    body {
        background: radial-gradient(circle at top left, #00425A, #002E47 70%);
        color: white;
    }

    .login-card {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1rem;
        padding: 2.5rem;
        max-width: 500px;
        margin: 4rem auto;
        box-shadow: 0 0 3rem rgba(255, 255, 255, 0.05);
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.08);
        color: white;
        border: none;
    }

    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        box-shadow: 0 0 0 0.2rem rgba(13, 202, 240, 0.25);
    }

    label {
        color: #b8cbd7;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #0dcaf0;
        border-color: #0dcaf0;
    }

    .btn-primary:hover {
        background-color: #0bbddc;
        border-color: #0bbddc;
    }

    .alert {
        background-color: rgba(220, 53, 69, 0.1);
        border: none;
        color: #f8d7da;
    }
</style>

<div class="container">
    <div class="login-card">
        <h2 class="mb-4 text-center">Login to Your Account</h2>

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    id="email"
                    required 
                    autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    id="password"
                    required>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
