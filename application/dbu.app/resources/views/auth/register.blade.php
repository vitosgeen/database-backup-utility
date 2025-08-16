@extends('layouts.app')

@section('content')
<style>
    body {
        background: radial-gradient(circle at top left, #00425A, #002E47 70%);
        color: white;
    }

    .register-card {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1rem;
        padding: 2.5rem;
        max-width: 550px;
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
        box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
    }

    label {
        color: #b8cbd7;
        font-weight: 500;
    }

    .btn-success {
        background-color: #198754;
        border-color: #198754;
    }

    .btn-success:hover {
        background-color: #157347;
        border-color: #157347;
    }

    .alert {
        background-color: rgba(220, 53, 69, 0.1);
        border: none;
        color: #f8d7da;
    }
</style>

<div class="container">
    <div class="register-card">
        <h2 class="mb-4 text-center">Create an Account</h2>

        <form method="POST" action="{{ url('/register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    class="form-control" 
                    required 
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    class="form-control" 
                    required 
                    value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    class="form-control" 
                    required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation"
                    class="form-control" 
                    required>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-success btn-block">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
