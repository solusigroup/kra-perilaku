<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar &mdash; Kuesioner Motivasi Akuntansi</title>
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
            top: -180px;
            left: -180px;
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.06) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -120px;
            right: -120px;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .register-wrapper {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
        }

        /* Back link */
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

        /* Info note */
        .info-note {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: var(--primary-light);
            border: 1px solid rgba(79, 70, 229, 0.12);
            border-radius: 14px;
            padding: 16px 20px;
            margin-bottom: 28px;
        }

        .info-note .note-icon {
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            background: rgba(79, 70, 229, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .info-note p {
            font-size: 0.85rem;
            color: var(--text-light);
            font-weight: 300;
            line-height: 1.6;
        }

        .info-note p strong {
            color: var(--text);
            font-weight: 600;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
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

    <div class="register-wrapper">
        <a href="{{ route('landing') }}" class="back-link fade-in">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Kembali ke Beranda
        </a>

        <div class="auth-card fade-in fade-in-delay">
            <div class="auth-logo">U</div>

            <h1 class="auth-title">Daftar Akun</h1>
            <p class="auth-subtitle">Buat akun untuk berpartisipasi dalam penelitian.</p>

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

            <form action="{{ route('register') }}" method="POST" autocomplete="off">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input @error('name') is-invalid @enderror"
                        placeholder="Masukkan nama lengkap Anda"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

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
                    >
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Info Note --}}
                <div class="info-note">
                    <div class="note-icon">💡</div>
                    <p>
                        <strong>Password tidak diperlukan.</strong> Cukup masukkan nama dan email untuk berpartisipasi. Anda dapat langsung masuk menggunakan email yang didaftarkan.
                    </p>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-submit">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                    Daftar Sekarang
                </button>
            </form>

            <p class="auth-footer">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk Disini</a>
            </p>
        </div>
    </div>

</body>
</html>
