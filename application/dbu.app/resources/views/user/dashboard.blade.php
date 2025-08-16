@extends('layouts.dashboard')

@section('content')

 
<!-- Main Content -->
<h2 class="mb-4">Dashboard</h2>

<!-- Cards -->
<div class="row g-4 mb-5">
<div class="col-sm-6 col-md-3">
    <div class="dashboard-card text-center">
    <h6>Databases</h6>
    <h3>8</h3>
    </div>
</div>
<div class="col-sm-6 col-md-3">
    <div class="dashboard-card text-center">
    <h6>Backups</h6>
    <h3>24</h3>
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
    <h3>Apr 23, 2024</h3>
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
    <tr>
        <td><span class="status-pill status-success">Success</span></td>
        <td>db1</td>
        <td>Apr 23, 2024</td>
    </tr>
    <tr>
        <td><span class="status-pill status-failed">Failed</span></td>
        <td>db2</td>
        <td>Apr 23, 2024</td>
    </tr>
    <tr>
        <td><span class="status-pill status-success">Success</span></td>
        <td>db3</td>
        <td>Apr 23, 2024</td>
    </tr>
    <tr>
        <td><span class="status-pill status-success">Success</span></td>
        <td>db2</td>
        <td>Apr 23, 2024</td>
    </tr>
    </tbody>
</table>
</div>


@endsection
