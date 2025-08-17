@extends('layouts.dashboard')

@section('content')
    <h2>Add New Database</h2>

    <form action="{{ route('databases.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="">Select Type</option>
                <option value="mysql">MySQL</option>
                <option value="pgsql">PostgreSQL</option>
                <option value="sqlite">SQLite</option>
                <option value="mongodb">MongoDB</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Host</label>
            <input name="host" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Port</label>
            <input name="port" class="form-control" required type="number">
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input name="password" class="form-control" required type="password">
        </div>

        <div class="mb-3">
            <label>Database Name</label>
            <input name="database_name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
