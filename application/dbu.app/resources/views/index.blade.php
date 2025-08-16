@extends('layouts.app')

@section('content')
  <!-- Hero Section -->
  <section class="py-5 px-4 px-md-5">
    <div class="container py-5">
      <div class="row align-items-center">
        <!-- Left Content -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="d-flex align-items-center mb-3">
            <div class="icon-box bg-success bg-opacity-25 text-success me-2">
              <i class="bi bi-hdd-stack"></i>
            </div>
            <span class="text-uppercase small fw-semibold">Database</span>
          </div>
          <h1 class="display-5 fw-bold mb-4">Database Backup Utility</h1>
          <p class="lead text-light mb-4">
            A secure, flexible CLI tool to back up and restore databases with cloud integration, compression, and multi-engine support.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="#" class="btn btn-success px-4 py-2 shadow-sm">Get Started</a>
            <a href="#" class="btn btn-outline-light px-4 py-2">View Docs</a>
          </div>
        </div>
        <!-- Right Icon -->
        <div class="col-lg-6 text-center">
          <i class="bi bi-laptop hero-icon"></i>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="bg-dark py-5 px-4 px-md-5">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-sm-6 col-lg-3">
          <div class="feature-card">
            <div class="icon-box bg-success bg-opacity-25 text-success mx-auto">
              <i class="bi bi-layers"></i>
            </div>
            <h5 class="fw-semibold">Multi-Database</h5>
            <p class="text-light small">Supports MySQL, PostgreSQL, MongoDB and more.</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="feature-card">
            <div class="icon-box bg-info bg-opacity-25 text-info mx-auto">
              <i class="bi bi-arrow-repeat"></i>
            </div>
            <h5 class="fw-semibold">Backup & Restore</h5>
            <p class="text-light small">Recover your data quickly and reliably, anytime.</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="feature-card">
            <div class="icon-box bg-warning bg-opacity-25 text-warning mx-auto">
              <i class="bi bi-file-zip"></i>
            </div>
            <h5 class="fw-semibold">Compression</h5>
            <p class="text-light small">Smaller, optimized backup sizes using gzip or zip.</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="feature-card">
            <div class="icon-box bg-primary bg-opacity-25 text-primary mx-auto">
              <i class="bi bi-cloud-upload"></i>
            </div>
            <h5 class="fw-semibold">Cloud Storage</h5>
            <p class="text-light small">Seamless upload to AWS S3, Google Drive, Dropbox.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection