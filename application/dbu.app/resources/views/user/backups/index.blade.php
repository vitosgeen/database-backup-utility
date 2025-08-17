@extends('layouts.dashboard')

@section('content')
    <h2>All Backups</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @forelse ($databases as $database)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>{{ $database->name }}</strong>
                <form method="POST" action="{{ route('backup.run', $database->id) }}">
                    @csrf
                    <button class="btn btn-sm btn-primary">Run Backup</button>
                </form>
            </div>
            <ul class="list-group list-group-flush">
                @forelse ($database->backups->take(3) as $backup)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            {{ $backup->filename }}
                            <br>
                            <small>{{ $backup->created_at->format('Y-m-d H:i') }} — {{ number_format($backup->size / 1024, 2) }} KB</small>
                        </div>
                        <div>
                            <a href="{{ route('backup.download', $backup->id) }}" class="btn btn-sm btn-outline-success">Download</a>
                            <form action="{{ route('backup.destroy', $backup->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this backup?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No backups yet.</li>
                @endforelse
            </ul>
        </div>
    @empty
        <p>No databases found.</p>
    @endforelse
@endsection
