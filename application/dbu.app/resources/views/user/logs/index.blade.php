@extends('layouts.dashboard')

@section('content')
    <!-- logs  tabs for logins, actions, backups, restores -->
    <ul class="nav nav-tabs user-logs">
        <li class="nav-item">
            <a class="nav-link active text-white" href="#login-logs" data-bs-toggle="tab">Login Activity</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#action-logs" data-bs-toggle="tab">Action Logs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#backup-logs" data-bs-toggle="tab">Backup Logs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#restore-logs" data-bs-toggle="tab">Restore Logs</a>
        </li>
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="login-logs">
            @include('user.logs.login')
        </div>
        <div class="tab-pane fade" id="action-logs">
            @include('user.logs.actions')
        </div>
        <div class="tab-pane fade" id="backup-logs">
            @include('user.logs.backups')
        </div>
        <div class="tab-pane fade" id="restore-logs">
            @include('user.logs.restores')
        </div>
    </div>
@endsection
