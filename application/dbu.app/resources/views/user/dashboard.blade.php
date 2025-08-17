@extends('layouts.dashboard')

@section('content')

 
<!-- Main Content -->
<h2 class="mb-4">Dashboard</h2>

<!-- Cards -->
<div class="row g-4 mb-5">
<div class="col-sm-6 col-md-3">
    <div class="dashboard-card text-center position-relative">
    <h6>
        <a href="{{ route('databases.index') }}" class="text-decoration-none text-light">Databases</a>
    </h6>
    <h3>{{ $countDatabases }}</h3>
    <a href="{{ route('databases.index') }}" class=" position-absolute top-0 end-0 m-2 text-light"><i class="bi bi-box-arrow-up-right"></i></a>
    </div>
</div>
<div class="col-sm-6 col-md-3">
    <div class="dashboard-card text-center position-relative">
    <h6>
        <a href="{{ route('backups.index') }}" class="text-decoration-none text-light">Backups</a>
    </h6>
    <h3>{{ $countBackups }}</h3>
    <a href="{{ route('backups.index') }}" class=" position-absolute top-0 end-0 m-2 text-light"><i class="bi bi-box-arrow-up-right"></i></a>
    </div>
</div>
<div class="col-sm-6 col-md-3">
    <div class="dashboard-card text-center">
    <h6>Scheduled</h6>
    <h3>Enabled</h3>
    </div>
</div>
<div class="col-sm-6 col-md-3">
    <div class="dashboard-card text-center">
    <h6>Last Backup</h6>
    <h3>{{ $maxDateBackup ? $maxDateBackup->format('M d, Y') : 'N/A' }}</h3>
    </div>
</div>
</div>

<!-- Backup History -->
<h4 class="mb-3">Backup History</h4>
<div class="table-responsive">
<table class="table table-borderless align-middle">
    <thead>
    <tr>
        <th>Status</th>
        <th>Database</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($backupHistory as $backup)
            <tr>
                <td><span class="status-pill {{ $backup->status }}">{{ ucfirst($backup->status) }}</span></td>
                <td>{{ $backup->database->name }}</td>
                <td>{{ $backup->created_at->format('M d, Y H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>


@endsection
