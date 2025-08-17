@extends('layouts.dashboard')

@section('content')
    <h2>Your Databases</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('databases.create') }}" class="btn button-midnight-green text-white mb-3">Add New</a>

    <ul class="list-group">
        @forelse ($databases as $db)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $db->name }}</strong> ({{ $db->type }}) - {{ $db->host }}:{{ $db->port }}
                </div>
                <div>
                    <form action="{{ route('databases.test', $db->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-info">Test</button>
                    </form>

                    <a href="{{ route('databases.edit', $db->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                    <form action="{{ route('databases.destroy', $db->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this database?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="list-group-item">No databases added.</li>
        @endforelse
    </ul>
@endsection
