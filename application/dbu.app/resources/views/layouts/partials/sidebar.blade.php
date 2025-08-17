<!-- Sidebar -->
<div class="px-4 mb-4">
  <div class="d-flex align-items-center">
    <i class="bi bi-hdd-network text-success fs-4 me-2"></i>
    <span class="fs-5 fw-semibold">Database<br><small class="text-white-50">Backup Utility</small></span>
  </div>
</div>
<nav class="px-3">
  <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
  <a href="{{ route('databases.index') }}"  class="nav-link {{ request()->routeIs('databases.*') ? 'active' : '' }}"><i class="bi bi-hdd-network me-2"></i> Databases</a>
  <a href="{{ route('backups.index') }}" class="nav-link {{ request()->routeIs('backups.*') ? 'active' : '' }}"><i class="bi bi-server me-2"></i> Backups</a>
  <a href="{{ route('settings.index') }}" class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }}"><i class="bi bi-gear me-2"></i> Settings</a>
  <a href="{{ route('logs.index') }}" class="nav-link {{ request()->routeIs('logs.*') ? 'active' : '' }}"><i class="bi bi-journal-text me-2"></i> Logs</a>
</nav>