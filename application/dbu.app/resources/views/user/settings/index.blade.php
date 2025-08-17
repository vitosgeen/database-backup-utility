@extends('layouts.dashboard')

@section('content')
    <h2>User Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" id="email" type="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        <button type="submit" class="btn button-midnight-green text-white">Update Settings</button>
    </form>
@endsection
