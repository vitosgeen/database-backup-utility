@extends('layouts.dashboard')

@section('content')
    <h2>Edit Database</h2>

    <form action="{{ route('databases.update', $database->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required value="{{ $database->name }}">
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                @foreach (['mysql', 'pgsql', 'sqlite', 'mongodb'] as $type)
                    <option value="{{ $type }}" @selected($database->type === $type)>{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Host</label>
            <input name="host" class="form-control" required value="{{ $database->host }}">
        </div>

        <div class="mb-3">
            <label>Port</label>
            <input name="port" class="form-control" required type="number" value="{{ $database->port }}">
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input name="username" class="form-control" required value="{{ $database->username }}">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input name="password" class="form-control" required value="{{ $database->password }}">
        </div>

        <div class="mb-3">
            <label>Database Name</label>
            <input name="database_name" class="form-control" required value="{{ $database->database_name }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
