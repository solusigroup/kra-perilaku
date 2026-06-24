<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk &mdash; Kuesioner Motivasi Akuntansi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-light: #eef2ff;
            --primary-glow: rgba(79, 70, 229, 0.15);
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            --error: #ef4444;
            --error-bg: #fef2f2;
            --error-border: #fecaca;
            --success: #10b981;
            --success-bg: #ecfdf5;
            --success-border: #a7f3d0;
        }

        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background decoration */
        body::before {
            content: '';
            position: fixed;
            top: -200px;
            right: -200px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.06) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -150px;
            left: -150px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .login-wrapper {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
        }

        /* Back to home link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 400;
            margin-bottom: 24px;
            padding: 6px 0;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: var(--primary);
        }

        .back-link svg {
            transition: transform 0.2s ease;
        }

        .back-link:hover svg {
            transform: translateX(-3px);
        }

        /* Card */
        .auth-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 44px 40px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04), 0 1px 2px rgba(0, 0, 0, 0.02);
        }

        .auth-logo {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 800;
            font-size: 1.3rem;
            margin-bottom: 28px;
        }

        .auth-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 6px;
            letter-spacing: -0.03em;
        }

        .auth-subtitle {
            font-size: 0.95rem;
            color: var(--text-light);
            font-weight: 300;
            margin-bottom: 32px;
        }

        /* Alerts */
        .alert {
            padding: 14px 18px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 400;
            margin-bottom: 24px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.5;
        }

        .alert-error {
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            color: #991b1b;
        }

        .alert-success {
            background: var(--success-bg);
            border: 1px solid var(--success-border);
            color: #065f46;
        }

        .alert-icon {
            flex-shrink: 0;
            font-size: 1.1rem;
            line-height: 1.4;
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 13px 16px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            color: var(--text);
            background: var(--bg);
            border: 1.5px solid var(--border);
            border-radius: 12px;
            outline: none;
            transition: all 0.25s ease;
        }

        .form-input::placeholder {
            color: #94a3b8;
            font-weight: 300;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-glow);
            background: var(--card-bg);
        }

        .form-input.is-invalid {
            border-color: var(--error);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .form-error {
            font-size: 0.82rem;
            color: var(--error);
            margin-top: 6px;
            font-weight: 400;
        }

        /* Password toggle */
        .password-section {
            display: none;
            margin-bottom: 20px;
        }

        .password-section.show {
            display: block;
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle-btn {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-light);
            padding: 4px;
            transition: color 0.2s;
        }

        .password-toggle-btn:hover {
            color: var(--primary);
        }

        .mode-toggle {
            display: block;
            width: 100%;
            padding: 10px 16px;
            background: var(--primary-light);
            border: 1px solid transparent;
            border-radius: 10px;
            color: var(--primary);
            font-family: 'Outfit', sans-serif;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            margin-bottom: 24px;
            transition: all 0.2s ease;
        }

        .mode-toggle:hover {
            background: #e0e7ff;
            border-color: rgba(79, 70, 229, 0.15);
        }

        /* Submit */
        .btn-submit {
            width: 100%;
            padding: 14px 24px;
            background: var(--primary);
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.25);
            letter-spacing: -0.01em;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
            box-shadow: 0 8px 28px rgba(79, 70, 229, 0.35);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Footer link */
        .auth-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 0.92rem;
            color: var(--text-light);
            font-weight: 300;
        }

        .auth-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .auth-footer a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .auth-card {
                padding: 32px 24px;
                border-radius: 20px;
            }

            .auth-title {
                font-size: 1.5rem;
            }
        }

        /* Fade in */
        .fade-in {
            opacity: 0;
            transform: translateY(16px);
            animation: fadeIn 0.5s ease forwards;
        }

        .fade-in-delay { animation-delay: 0.1s; }

        @keyframes fadeIn {
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <a href="{{ route('landing') }}" class="back-link fade-in">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Kembali ke Beranda
        </a>

        <div class="auth-card fade-in fade-in-delay">
            <div class="auth-logo">U</div>

            <h1 class="auth-title">Selamat Datang Kembali</h1>
            <p class="auth-subtitle">Masuk ke akun Anda untuk melanjutkan</p>

            {{-- Session Alerts --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <span class="alert-icon">✓</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <span class="alert-icon">!</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" autocomplete="off">
                @csrf

                <input type="hidden" name="password_mode" id="passwordMode" value="0">

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input @error('email') is-invalid @enderror"
                        placeholder="nama@email.com"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Mode Toggle --}}
                <button type="button" class="mode-toggle" id="modeToggleBtn" onclick="toggleMode()">
                    🔑 Masuk dengan Password
                </button>

                {{-- Password (hidden by default) --}}
                <div class="password-section" id="passwordSection">
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-wrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input @error('password') is-invalid @enderror"
                                placeholder="Masukkan password Anda"
                            >
                            <button type="button" class="password-toggle-btn" onclick="togglePassword()" aria-label="Toggle password">
                                <svg id="eyeIcon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-submit">Masuk</button>
            </form>

            <p class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
            }
        }

        function toggleMode() {
            const section = document.getElementById('passwordSection');
            const modeInput = document.getElementById('passwordMode');
            const toggleBtn = document.getElementById('modeToggleBtn');

            if (section.classList.contains('show')) {
                section.classList.remove('show');
                modeInput.value = '0';
                toggleBtn.innerHTML = '🔑 Masuk dengan Password';
                document.getElementById('password').value = '';
            } else {
                section.classList.add('show');
                modeInput.value = '1';
                toggleBtn.innerHTML = '✉️ Masuk tanpa Password';
                document.getElementById('password').focus();
            }
        }
    </script>

</body>
</html>
