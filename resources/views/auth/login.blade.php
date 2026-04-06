<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BPKAD || Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --navy: #0B1F3A;
            --navy-mid: #12305C;
            --gold: #C8A84B;
            --gold-light: #E8C96D;
            --cream: #F8F5EE;
        }

        html,
        body {
            height: 100%;
            font-family: 'DM Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* ══════════════ LAYOUT ══════════════ */
        .login-wrap {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        @media (max-width: 768px) {
            .login-wrap {
                grid-template-columns: 1fr;
            }

            .login-left {
                display: none;
            }
        }

        /* ══════════════ LEFT PANEL ══════════════ */
        .login-left {
            position: relative;
            overflow: hidden;
            background: var(--navy);
        }

        .login-left img.bg-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            opacity: 0.35;
            transform: scale(1.04);
            transition: transform 8s ease;
        }

        .login-left:hover img.bg-img {
            transform: scale(1);
        }

        /* gradient overlay */
        .login-left-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg,
                    rgba(11, 31, 58, 0.70) 0%,
                    rgba(18, 48, 92, 0.55) 50%,
                    rgba(11, 31, 58, 0.85) 100%);
        }

        /* decorative circles */
        .login-left::before {
            content: '';
            position: absolute;
            top: -80px;
            left: -80px;
            width: 380px;
            height: 380px;
            border: 1px solid rgba(200, 168, 75, 0.12);
            border-radius: 50%;
            z-index: 1;
        }

        .login-left::after {
            content: '';
            position: absolute;
            bottom: -60px;
            right: -60px;
            width: 280px;
            height: 280px;
            border: 1px solid rgba(200, 168, 75, 0.1);
            border-radius: 50%;
            z-index: 1;
        }

        /* left content */
        .login-left-content {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 52px 48px;
        }

        .left-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(200, 168, 75, 0.15);
            border: 1px solid rgba(200, 168, 75, 0.35);
            color: var(--gold-light);
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 99px;
            margin-bottom: 20px;
            width: fit-content;
        }

        .left-badge::before {
            content: '';
            width: 5px;
            height: 5px;
            background: var(--gold);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .4;
                transform: scale(1.8);
            }
        }

        .left-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: white;
            line-height: 1.25;
            margin-bottom: 16px;
        }

        .left-title span {
            color: var(--gold-light);
        }

        .left-sub {
            font-size: 0.88rem;
            color: rgba(255, 255, 255, 0.55);
            line-height: 1.75;
            max-width: 340px;
            margin-bottom: 36px;
        }

        /* stats row */
        .left-stats {
            display: flex;
            gap: 32px;
        }

        .left-stat-item {
            border-left: 2px solid rgba(200, 168, 75, 0.4);
            padding-left: 14px;
        }

        .left-stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--gold-light);
            line-height: 1;
        }

        .left-stat-label {
            font-size: 0.72rem;
            color: rgba(255, 255, 255, 0.45);
            letter-spacing: 0.05em;
            margin-top: 4px;
        }

        /* top-left logo on panel */
        .left-logo {
            position: absolute;
            top: 40px;
            left: 48px;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .left-logo img {
            height: 44px;
            width: auto;
        }

        .left-logo-text p:first-child {
            color: white;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .left-logo-text p:last-child {
            color: rgba(200, 168, 75, 0.8);
            font-size: 0.68rem;
            letter-spacing: 0.05em;
        }

        /* ══════════════ RIGHT PANEL ══════════════ */
        .login-right {
            background: var(--cream);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
            position: relative;
        }

        /* subtle dot pattern */
        .login-right::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(11, 31, 58, 0.055) 1px, transparent 1px);
            background-size: 24px 24px;
            pointer-events: none;
        }

        .form-box {
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
        }

        /* mobile logo */
        .mobile-logo {
            display: none;
            flex-direction: column;
            align-items: center;
            margin-bottom: 32px;
        }

        .mobile-logo img {
            height: 52px;
            width: auto;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .mobile-logo {
                display: flex;
            }
        }

        /* form heading */
        .form-eyebrow {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 10px;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 0.85rem;
            color: #7A8899;
            margin-bottom: 36px;
            line-height: 1.6;
        }

        /* gold line under title */
        .form-title-bar {
            width: 44px;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light));
            border-radius: 2px;
            margin-bottom: 32px;
        }

        /* ── ALERT ── */
        .alert-box {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: #FEF2F2;
            border: 1px solid #FCA5A5;
            border-left: 4px solid #EF4444;
            border-radius: 10px;
            padding: 14px 16px;
            margin-bottom: 24px;
            animation: slideIn 0.4s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .alert-icon {
            font-size: 1.1rem;
            margin-top: 1px;
            flex-shrink: 0;
        }

        .alert-text strong {
            display: block;
            font-size: 0.82rem;
            color: #B91C1C;
            margin-bottom: 2px;
        }

        .alert-text p {
            font-size: 0.8rem;
            color: #991B1B;
        }

        /* ── FORM FIELDS ── */
        .field-group {
            margin-bottom: 20px;
        }

        .field-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            color: var(--navy);
            margin-bottom: 8px;
        }

        .field-wrap {
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            pointer-events: none;
            transition: color 0.2s;
        }

        .field-icon svg {
            width: 16px;
            height: 16px;
            display: block;
        }

        .field-input {
            width: 100%;
            padding: 13px 44px;
            border: 1.5px solid #E2E8F0;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            color: var(--navy);
            background: white;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .field-input::placeholder {
            color: #B0BCC9;
        }

        .field-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(200, 168, 75, 0.12);
        }

        .field-input:focus~.field-icon,
        .field-wrap:focus-within .field-icon {
            color: var(--gold);
        }

        /* toggle password eye */
        .field-eye {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #94A3B8;
            padding: 0;
            line-height: 0;
            transition: color 0.2s;
        }

        .field-eye:hover {
            color: var(--navy);
        }

        .field-eye svg {
            width: 16px;
            height: 16px;
            display: block;
        }

        /* ── SUBMIT BUTTON ── */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            color: white;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 8px;
            position: relative;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 6px 24px rgba(11, 31, 58, 0.22);
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(11, 31, 58, 0.3);
        }

        .btn-submit:hover::before {
            opacity: 1;
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit span {
            position: relative;
            z-index: 1;
        }

        .btn-submit:hover span {
            color: var(--navy);
        }

        /* ── DIVIDER ── */
        .form-divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 28px 0 20px;
        }

        .form-divider::before,
        .form-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #E2E8F0;
        }

        .form-divider span {
            font-size: 0.72rem;
            color: #94A3B8;
            letter-spacing: 0.06em;
            white-space: nowrap;
        }

        /* ── FOOTER NOTE ── */
        .form-footer {
            text-align: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid rgba(200, 168, 75, 0.15);
        }

        .form-footer p {
            font-size: 0.72rem;
            color: #94A3B8;
            line-height: 1.7;
        }

        .form-footer strong {
            color: var(--gold);
            font-weight: 600;
        }

        /* ── LOADING STATE ── */
        .btn-submit.loading span::after {
            content: '';
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 2px solid rgba(255, 255, 255, 0.4);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            margin-left: 10px;
            vertical-align: middle;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <div class="login-wrap">

        {{-- ══════ LEFT PANEL ══════ --}}
        <div class="login-left">
            <img class="bg-img" src="{{ asset('assets/local/gedung.png') }}" alt="Kantor BPKAD">
            <div class="login-left-overlay"></div>

            {{-- Top logo --}}
            <div class="left-logo">
                <img src="{{ asset('assets/local/logobpkad.png') }}" alt="Logo">
                <div class="left-logo-text">
                    <p>BPKAD Serdang Bedagai</p>
                    <p>Portal Administrasi</p>
                </div>
            </div>

            {{-- Bottom content --}}
            <div class="login-left-content">
                <div class="left-badge">Portal Resmi BPKAD</div>

                <h2 class="left-title">
                    Pengelolaan Keuangan<br>
                    &amp; Aset <span>Daerah</span>
                </h2>

                <p class="left-sub">
                    Sistem informasi terpadu untuk mendukung transparansi dan akuntabilitas pengelolaan keuangan daerah
                    Kabupaten Serdang Bedagai.
                </p>

                <div class="left-stats">
                    <div class="left-stat-item">
                        <div class="left-stat-num">100%</div>
                        <div class="left-stat-label">Transparan</div>
                    </div>

                    <div class="left-stat-item">
                        <div class="left-stat-num">2026</div>
                        <div class="left-stat-label">Aktif Beroperasi</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════ RIGHT PANEL ══════ --}}
        <div class="login-right">
            <div class="form-box">

                {{-- Mobile logo --}}
                <div class="mobile-logo">
                    <img src="{{ asset('assets/local/logobpkad.png') }}" alt="Logo BPKAD">
                    <p style="font-size:.8rem; color:#7A8899; font-weight:500">BPKAD Serdang Bedagai</p>
                </div>

                {{-- Heading --}}
                <p class="form-eyebrow">Portal Administrasi</p>
                <h1 class="form-title">Masuk ke<br>Sistem</h1>
                <div class="form-title-bar"></div>
                <p class="form-subtitle">Gunakan kredensial yang telah diberikan untuk mengakses dashboard admin.</p>

                {{-- Alert error --}}
                @if (\Illuminate\Support\Facades\Session::has('failed'))
                    <div class="alert-box">
                        <span class="alert-icon">⚠️</span>
                        <div class="alert-text">
                            <strong>Login Gagal</strong>
                            <p>{{ \Illuminate\Support\Facades\Session::get('failed') }}</p>
                        </div>
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" id="loginForm">
                    @csrf

                    {{-- Username --}}
                    <div class="field-group">
                        <label class="field-label" for="username">Username</label>
                        <div class="field-wrap">
                            <span class="field-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </span>
                            <input class="field-input" type="text" id="username" name="username"
                                placeholder="Masukkan username" autocomplete="username" required>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="field-group">
                        <label class="field-label" for="password">Password</label>
                        <div class="field-wrap">
                            <span class="field-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </span>
                            <input class="field-input" type="password" id="password" name="password"
                                placeholder="Masukkan password" autocomplete="current-password" required>
                            <button type="button" class="field-eye" id="togglePwd" aria-label="Toggle password">
                                <svg id="eyeOpen" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                <svg id="eyeClosed" class="hidden" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94" />
                                    <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19" />
                                    <line x1="1" y1="1" x2="23" y2="23" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-submit" id="btnLogin">
                        <span>Masuk ke Sistem</span>
                    </button>

                </form>

                {{-- Footer --}}
                <div class="form-footer">
                    <p>Akses terbatas untuk pengguna yang berwenang.<br>
                        <strong>BPKAD</strong> · Kabupaten Serdang Bedagai · © 2026
                    </p>
                </div>

            </div>
        </div>

    </div>

    <script>
        // Toggle password visibility
        const pwd = document.getElementById('password');
        const toggle = document.getElementById('togglePwd');
        const eyeO = document.getElementById('eyeOpen');
        const eyeC = document.getElementById('eyeClosed');

        toggle.addEventListener('click', () => {
            const show = pwd.type === 'password';
            pwd.type = show ? 'text' : 'password';
            eyeO.classList.toggle('hidden', show);
            eyeC.classList.toggle('hidden', !show);
        });

        // Loading state on submit
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('btnLogin');
            btn.disabled = true;
            btn.classList.add('loading');
        });
    </script>

</body>

</html>
