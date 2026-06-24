<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuesioner Motivasi Akuntansi &mdash; UBS PPNI Research</title>
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
            --success: #10b981;
            --warning: #f59e0b;
        }

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
        }

        /* ── Navbar ── */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            transition: box-shadow 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
        }

        .navbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand .brand-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1rem;
            font-weight: 800;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-light);
            font-weight: 400;
            font-size: 0.92rem;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            color: var(--primary);
            background: var(--primary-light);
        }

        .nav-link-primary {
            background: var(--primary);
            color: #fff !important;
            font-weight: 600;
        }

        .nav-link-primary:hover {
            background: var(--primary-hover) !important;
            color: #fff !important;
        }

        .nav-link-outline {
            border: 1.5px solid var(--border);
            color: var(--text) !important;
            font-weight: 600;
        }

        .nav-link-outline:hover {
            border-color: var(--primary);
            color: var(--primary) !important;
            background: var(--primary-light) !important;
        }

        .logout-form {
            display: inline;
        }

        .logout-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            color: var(--text);
            font-size: 1.5rem;
            transition: background 0.2s;
        }

        .mobile-menu-btn:hover {
            background: var(--primary-light);
        }

        /* ── Hero ── */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 24px 80px;
            background: linear-gradient(160deg, #eef2ff 0%, #e0e7ff 30%, #c7d2fe 60%, #ddd6fe 100%);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -120px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.12) 0%, transparent 70%);
            border-radius: 50%;
            animation: float1 8s ease-in-out infinite;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(124, 58, 237, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float2 10s ease-in-out infinite;
        }

        @keyframes float1 {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(-30px, 30px) scale(1.05);
            }
        }

        @keyframes float2 {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(20px, -20px) scale(1.08);
            }
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.08;
            background: var(--primary);
        }

        .shape-1 {
            width: 200px;
            height: 200px;
            top: 15%;
            left: 8%;
            animation: float1 12s ease-in-out infinite;
        }

        .shape-2 {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation: float2 9s ease-in-out infinite;
            background: #7c3aed;
        }

        .shape-3 {
            width: 80px;
            height: 80px;
            top: 25%;
            right: 25%;
            animation: float1 7s ease-in-out infinite reverse;
            border-radius: 20%;
            transform: rotate(45deg);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 780px;
            text-align: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(79, 70, 229, 0.15);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 28px;
            letter-spacing: 0.02em;
        }

        .hero-badge .dot {
            width: 8px;
            height: 8px;
            background: var(--success);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(0.8);
            }
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 800;
            line-height: 1.15;
            color: var(--text);
            margin-bottom: 20px;
            letter-spacing: -0.03em;
        }

        .hero-title .highlight {
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-institution {
            font-size: 1rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 12px;
        }

        .hero-desc {
            font-size: 1.05rem;
            color: var(--text-light);
            font-weight: 300;
            line-height: 1.8;
            margin-bottom: 36px;
            max-width: 640px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-desc strong {
            font-weight: 600;
            color: var(--text);
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 36px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 32px;
            border-radius: 12px;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
            letter-spacing: -0.01em;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            box-shadow: 0 8px 28px rgba(79, 70, 229, 0.4);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--card-bg);
            color: var(--text);
            border: 1.5px solid var(--border);
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-light);
            transform: translateY(-2px);
        }

        /* ── Privacy Box ── */
        .privacy-box {
            display: inline-flex;
            align-items: flex-start;
            gap: 12px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(79, 70, 229, 0.1);
            border-radius: 14px;
            padding: 16px 24px;
            max-width: 560px;
            margin: 0 auto;
            text-align: left;
        }

        .privacy-box .shield-icon {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            background: var(--primary-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .privacy-box p {
            font-size: 0.85rem;
            color: var(--text-light);
            font-weight: 300;
            line-height: 1.6;
        }

        .privacy-box p strong {
            color: var(--text);
            font-weight: 600;
        }

        /* ── Guide Section ── */
        .guide-section {
            padding: 100px 24px;
            background: var(--card-bg);
        }

        .guide-inner {
            max-width: 1000px;
            margin: 0 auto;
        }

        .section-eyebrow {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 12px;
            text-align: center;
        }

        .section-title {
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 800;
            color: var(--text);
            text-align: center;
            margin-bottom: 16px;
            letter-spacing: -0.03em;
        }

        .section-subtitle {
            font-size: 1rem;
            color: var(--text-light);
            text-align: center;
            font-weight: 300;
            margin-bottom: 60px;
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .step-card {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 36px 28px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
        }

        .step-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 48px rgba(79, 70, 229, 0.08);
            border-color: rgba(79, 70, 229, 0.2);
        }

        .step-number {
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
            margin: 0 auto 20px;
        }

        .step-card h3 {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 10px;
        }

        .step-card p {
            font-size: 0.92rem;
            color: var(--text-light);
            font-weight: 300;
            line-height: 1.7;
        }

        /* ── Footer ── */
        .footer {
            padding: 40px 24px;
            text-align: center;
            border-top: 1px solid var(--border);
            background: var(--bg);
        }

        .footer p {
            font-size: 0.85rem;
            color: var(--text-light);
            font-weight: 300;
        }

        .footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .navbar-links {
                display: none;
                position: absolute;
                top: 68px;
                left: 0;
                right: 0;
                background: var(--card-bg);
                flex-direction: column;
                padding: 16px 24px;
                border-bottom: 1px solid var(--border);
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
                gap: 4px;
            }

            .navbar-links.open {
                display: flex;
            }

            .nav-link,
            .nav-link-primary,
            .nav-link-outline {
                width: 100%;
                text-align: center;
                padding: 12px 16px;
            }

            .mobile-menu-btn {
                display: block;
            }

            .steps-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .hero {
                padding: 110px 20px 60px;
            }

            .hero-desc {
                font-size: 0.95rem;
            }

            .btn {
                width: 100%;
                justify-content: center;
                padding: 14px 24px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .privacy-box {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }

        /* ── Fade-in animation ── */
        .fade-up {
            opacity: 0;
            transform: translateY(24px);
            animation: fadeUp 0.7s ease forwards;
        }

        .fade-up-delay-1 {
            animation-delay: 0.1s;
        }

        .fade-up-delay-2 {
            animation-delay: 0.2s;
        }

        .fade-up-delay-3 {
            animation-delay: 0.3s;
        }

        .fade-up-delay-4 {
            animation-delay: 0.4s;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    {{-- ── Navbar ── --}}
    <nav class="navbar" id="navbar">
        <div class="navbar-inner">
            <a href="{{ route('landing') }}" class="navbar-brand">
                <span class="brand-icon">U</span>
                UBS PPNI Research
            </a>

            <button class="mobile-menu-btn" onclick="toggleMenu()" aria-label="Menu">☰</button>

            <div class="navbar-links" id="navLinks">
                <a href="#panduan" class="nav-link">Panduan</a>

                @guest
                    <a href="{{ route('login') }}" class="nav-link nav-link-outline">Login</a>
                    <a href="{{ route('register') }}" class="nav-link nav-link-primary">Register</a>
                @endguest

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">Admin Panel</a>
                    @else
                        <a href="{{ route('kuesioner.create') }}" class="nav-link">Dashboard</a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="nav-link nav-link-outline logout-btn">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    {{-- ── Hero ── --}}
    <section class="hero">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>

        <div class="hero-content">
            <div class="hero-badge fade-up">
                <span class="dot"></span>
                Penelitian Perilaku Akuntansi &mdash; 2026
            </div>

            <p class="hero-institution fade-up fade-up-delay-1">Universitas Bina Sehat PPNI Mojokerto</p>

            <h1 class="hero-title fade-up fade-up-delay-1">
                Motivasi Mahasiswa Memilih Program Studi<br>
                <span class="highlight">Akuntansi di Era Disrupsi Digital</span>
            </h1>

            <p class="hero-desc fade-up fade-up-delay-2">
                Penelitian ini dilakukan oleh <strong>Team Riset Konferensi Regional Akuntansi XIII</strong> untuk
                memahami faktor-faktor yang memotivasi mahasiswa dalam memilih program studi Akuntansi di tengah
                perkembangan teknologi digital yang semakin pesat. Partisipasi Anda sangat berarti bagi pengembangan
                kurikulum dan strategi pendidikan akuntansi di masa depan.
            </p>

            <div class="hero-actions fade-up fade-up-delay-3">
                @guest
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                        </svg>
                        Ikut Berpartisipasi
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-secondary">Sudah Ada Akun</a>
                @endguest

                @auth
                    <a href="{{ route('kuesioner.create') }}" class="btn btn-primary">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Mulai Kuesioner
                    </a>
                    <a href="{{ route('kuesioner.index') }}" class="btn btn-secondary">Lihat Hasil</a>
                @endauth
            </div>

            <div class="privacy-box fade-up fade-up-delay-4">
                <div class="shield-icon">🔒</div>
                <p>
                    <strong>Privasi Terjamin.</strong> Seluruh data yang Anda berikan bersifat rahasia dan hanya
                    digunakan untuk keperluan akademis. Identitas responden tidak akan dipublikasikan.
                </p>
            </div>
        </div>
    </section>

    {{-- ── Panduan ── --}}
    <section class="guide-section" id="panduan">
        <div class="guide-inner">
            <p class="section-eyebrow">Panduan</p>
            <h2 class="section-title">Cara Berpartisipasi</h2>
            <p class="section-subtitle">Ikuti tiga langkah mudah berikut untuk mengisi kuesioner penelitian ini.</p>

            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3>Daftar Akun</h3>
                    <p>Buat akun dengan memasukkan nama lengkap dan alamat email Anda. Proses pendaftaran cepat dan
                        mudah tanpa perlu password.</p>
                </div>

                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3>Isi Data Identitas</h3>
                    <p>Lengkapi informasi dasar seperti jenis kelamin, usia, semester, dan latar belakang pendidikan
                        Anda sebagai responden.</p>
                </div>

                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3>Jawab Kuesioner</h3>
                    <p>Jawab pertanyaan penelitian menggunakan skala Likert (Sangat Tidak Setuju hingga Sangat Setuju)
                        sesuai pendapat Anda.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Footer ── --}}
    <footer class="footer">
        <p>&copy; {{ date('Y') }} <a href="{{ route('landing') }}">Kuesioner Motivasi Akuntansi</a> &mdash; Universitas
            Bina Sehat PPNI Mojokerto</p>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('open');
        }

        // Close mobile menu on link click
        document.querySelectorAll('.navbar-links .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('navLinks').classList.remove('open');
            });
        });
    </script>

</body>

</html>