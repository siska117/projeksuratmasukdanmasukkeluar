<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Kasbangpol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden;
        }

        .split-container {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* ============ KIRI: FORM ============ */
        .left-side {
            flex: 1;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f1b2d;
            overflow: hidden;
        }

        .left-side::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(212,175,55,0.15) 0%, transparent 70%);
            top: -200px;
            left: -200px;
            animation: floatGlow 10s ease-in-out infinite alternate;
        }
        .left-side::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(37,99,168,0.25) 0%, transparent 70%);
            bottom: -150px;
            right: -150px;
            animation: floatGlow 12s ease-in-out infinite alternate-reverse;
        }

        @keyframes floatGlow {
            0%   { transform: translate(0, 0) scale(1); }
            100% { transform: translate(60px, 40px) scale(1.15); }
        }

        .login-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 380px;
            padding: 48px 40px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 70px rgba(0,0,0,0.5);
            opacity: 0;
            transform: translateY(30px);
            animation: cardIn 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards;
        }

        @keyframes cardIn {
            to { opacity: 1; transform: translateY(0); }
        }

        .brand-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            box-shadow: none;
            border-radius: 0;
        }

        .brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 8px 20px rgba(212,175,55,0.35));
            animation: logoPop 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.1s backwards;
        }

        @keyframes logoPop {
            from { opacity: 0; transform: scale(0.6) rotate(-8deg); }
            to   { opacity: 1; transform: scale(1) rotate(0deg); }
        }

        .logo-text {
            color: #ffffff;
            font-weight: 800;
            font-size: 1.6rem;
            letter-spacing: 1px;
            text-align: center;
        }

        .subtitle {
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            text-align: center;
            margin-bottom: 36px;
            letter-spacing: 0.5px;
        }

        .form-label {
            color: rgba(255,255,255,0.75);
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 8px;
        }

        .form-control {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            color: #fff;
            padding: 12px 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.09);
            border-color: #d4af37;
            box-shadow: 0 0 0 4px rgba(212,175,55,0.15);
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.3);
        }

        .invalid-feedback {
            color: #ff8a8a;
        }

        .btn-login {
            background: linear-gradient(135deg, #d4af37, #b8912c);
            color: #0f1b2d;
            border: none;
            font-weight: 700;
            padding: 13px 0;
            border-radius: 12px;
            width: 100%;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .btn-login::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.5), transparent);
            transition: left 0.6s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(212,175,55,0.4);
            color: #0f1b2d;
        }

        /* ============ KANAN: FOTO ============ */
        .right-side {
            flex: 1.2;
            position: relative;
            overflow: hidden;
        }

        .right-side img.bg-photo {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.08);
            animation: kenBurns 20s ease-in-out infinite alternate;
        }

        @keyframes kenBurns {
            0%   { transform: scale(1.08) translate(0, 0); }
            100% { transform: scale(1.18) translate(-2%, -1%); }
        }

        .right-side::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15,27,45,0.2) 0%, rgba(15,27,45,0.55) 60%, rgba(15,27,45,0.92) 100%);
            z-index: 1;
        }

        .right-side::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(180deg, transparent, rgba(212,175,55,0.6), transparent);
            z-index: 2;
        }

        .right-caption {
            position: absolute;
            bottom: 50px;
            left: 60px;
            right: 60px;
            color: #fff;
            z-index: 3;
            opacity: 0;
            transform: translateY(20px);
            animation: captionIn 1s cubic-bezier(0.16,1,0.3,1) 0.6s forwards;
        }

        @keyframes captionIn {
            to { opacity: 1; transform: translateY(0); }
        }

        .right-caption .eyebrow {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #d4af37;
            text-transform: uppercase;
            margin-bottom: 12px;
            padding: 6px 14px;
            border: 1px solid rgba(212,175,55,0.4);
            border-radius: 30px;
            background: rgba(212,175,55,0.08);
        }

        .right-caption h2 {
            font-weight: 800;
            font-size: 2rem;
            line-height: 1.25;
            margin-bottom: 10px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        .right-caption p {
            color: rgba(255,255,255,0.7);
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        /* ===== FOOTER — di bawah teks caption ===== */
        .right-footer {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .right-footer .footer-copy {
            font-size: 0.78rem;
            color: rgba(255,255,255,0.45);
        }

        .right-footer .footer-copy strong {
            color: rgba(255,255,255,0.75);
            font-weight: 700;
        }

        .right-footer .footer-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .right-footer .footer-links a {
            font-size: 0.78rem;
            color: rgba(212,175,55,0.75);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .right-footer .footer-links a:hover {
            color: #f4e5a1;
        }

        .right-footer .footer-links .dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(212,175,55,0.5);
            z-index: 2;
            animation: rise linear infinite;
        }

        @keyframes rise {
            0%   { transform: translateY(0) translateX(0); opacity: 0; }
            10%  { opacity: 0.8; }
            90%  { opacity: 0.4; }
            100% { transform: translateY(-100vh) translateX(30px); opacity: 0; }
        }

        @media (max-width: 900px) {
            .right-side { display: none; }
            .left-side { flex: 1 1 100%; }
        }
    </style>
</head>
<body>
    <div class="split-container">
        <!-- KIRI: FORM -->
        <div class="left-side">
            <div class="login-card text-center">
                <div class="brand-icon">
                    <img src="{{ asset('images/logo-kesbangpol.png') }}" alt="Logo Kesbangpol">
                </div>
                <div class="logo-text">KASBANGPOL</div>
                <div class="subtitle">Sistem Agenda Surat</div>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-3 text-start">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                               value="{{ old('username') }}" placeholder="Masukkan username" required autofocus>
                        @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4 text-start">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan password" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-login">Masuk</button>
                </form>
            </div>
        </div>

        <!-- KANAN: FOTO -->
        <div class="right-side">
            <img src="{{ asset('images/yang nk di pakek.jpg') }}" alt="Kantor Kasbangpol" class="bg-photo">

            <div class="particle" style="width:6px; height:6px; left:20%; animation-duration:9s; animation-delay:0s;"></div>
            <div class="particle" style="width:4px; height:4px; left:45%; animation-duration:12s; animation-delay:2s;"></div>
            <div class="particle" style="width:5px; height:5px; left:65%; animation-duration:10s; animation-delay:4s;"></div>
            <div class="particle" style="width:3px; height:3px; left:80%; animation-duration:14s; animation-delay:1s;"></div>
            <div class="particle" style="width:5px; height:5px; left:30%; animation-duration:11s; animation-delay:5s;"></div>

            <div class="right-caption">
                <span class="eyebrow">Provinsi Sumatera Selatan</span>
                <h2>Badan Kesatuan Bangsa<br>dan Politik</h2>
                <p>Sistem Agenda Surat — Terintegrasi, Aman, dan Terpercaya</p>

                <!-- FOOTER di bawah teks di atas -->
                <div class="right-footer">
                    <div class="footer-copy">
                        © {{ date('Y') }} <strong>Kesbangpol</strong> Prov. Sumatera Selatan
                    </div>
                    <div class="footer-links">
                        <a href="#">Bantuan</a>
                        <span class="dot"></span>
                        <a href="#">Privasi</a>
                        <span class="dot"></span>
                        <a href="#">Tim IT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>