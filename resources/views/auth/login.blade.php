<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Kasbangpol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1a3c6b, #2563a8); min-height:100vh;
               display:flex; align-items:center; justify-content:center; }
        .login-card { background:#fff; border-radius:16px; padding:40px; width:380px;
                      box-shadow:0 20px 60px rgba(0,0,0,.3); }
        .logo-text { color:#1a3c6b; font-weight:800; font-size:1.5rem; }
        .btn-login { background:#1a3c6b; color:#fff; border:none; }
        .btn-login:hover { background:#143058; color:#fff; }
    </style>
</head>
<body>
    <div class="login-card text-center">
        <div class="mb-4">
            <div style="font-size:3rem">🏛️</div>
            <div class="logo-text">KASBANGPOL</div>
            <div class="text-muted small">Sistem Agenda Surat</div>
        </div>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label fw-semibold">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                       value="{{ old('username') }}" required autofocus>
                @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4 text-start">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-login w-100 py-2">Masuk</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>