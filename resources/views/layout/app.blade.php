<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Surat — Kasbangpol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root { --kasbang-biru: #1a3c6b; --kasbang-emas: #c8a84b; }
        body { background: #f4f6fb; font-family: 'Segoe UI', sans-serif; }
        .sidebar { min-height: 100vh; background: var(--kasbang-biru); width: 250px; }
        .sidebar .logo { padding: 20px 16px 10px; border-bottom: 1px solid rgba(255,255,255,.1); }
        .sidebar .logo h5 { color: var(--kasbang-emas); font-weight: 700; font-size: 1rem; }
        .sidebar .logo small { color: rgba(255,255,255,.6); font-size:.75rem; }
        .sidebar .nav-link { color: rgba(255,255,255,.8); padding: 10px 16px; border-radius: 6px; margin: 2px 8px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,.12); color: #fff; }
        .sidebar .nav-link i { margin-right: 8px; }
        .topbar { background: #fff; border-bottom: 1px solid #e0e7ef; padding: 14px 24px; }
        .badge-admin { background: var(--kasbang-emas); color: #1a3c6b; font-weight:600; }
        .badge-pimpinan { background: #6c757d; color: #fff; }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="logo text-center">
            <h5>🏛️ KASBANGPOL</h5>
            <small>Agenda Surat</small>
        </div>
        <nav class="nav flex-column mt-3 flex-grow-1">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('surat-masuk.*') ? 'active' : '' }}"
               href="{{ route('surat-masuk.index') }}">
                <i class="bi bi-envelope-arrow-down"></i> Surat Masuk
            </a>
            <a class="nav-link {{ request()->routeIs('surat-keluar.*') ? 'active' : '' }}"
               href="{{ route('surat-keluar.index') }}">
                <i class="bi bi-envelope-arrow-up"></i> Surat Keluar
            </a>
        </nav>
        <div class="p-3 border-top" style="border-color:rgba(255,255,255,.1)!important">
            <div class="text-white-50 small mb-2">
                <i class="bi bi-person-circle"></i>
                {{ session('user_name') }}
                <span class="badge ms-1 {{ session('user_role') === 'admin' ? 'badge-admin' : 'badge-pimpinan' }}">
                    {{ ucfirst(session('user_role')) }}
                </span>
            </div>
            <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-light w-100">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">
        <div class="topbar d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">@yield('title', 'Dashboard')</h6>
            <span class="text-muted small">{{ now()->format('d F Y') }}</span>
        </div>
        <div class="p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-x-circle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>