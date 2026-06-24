<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Berhasil Terkirim!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .thanks-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 3rem 2.5rem;
            max-width: 520px;
            width: 90%;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .06);
            animation: cardIn .5s ease;
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ── Bouncing emoji ── */
        .success-icon {
            font-size: 4rem;
            display: inline-block;
            animation: bounce 1.8s ease infinite;
            margin-bottom: 1.25rem;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            20% {
                transform: translateY(-18px);
            }
            40% {
                transform: translateY(0);
            }
            55% {
                transform: translateY(-9px);
            }
            70% {
                transform: translateY(0);
            }
        }

        .thanks-card h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -.03em;
            color: var(--text);
            margin-bottom: .6rem;
        }

        .thanks-card p {
            font-size: .95rem;
            font-weight: 300;
            color: var(--text-light);
            line-height: 1.65;
            margin-bottom: 1.75rem;
        }

        .btn-home {
            display: inline-block;
            font-family: 'Outfit', sans-serif;
            font-size: .95rem;
            font-weight: 700;
            padding: .8rem 2.25rem;
            background: var(--primary);
            color: #fff;
            text-decoration: none;
            border-radius: 12px;
            transition: all .25s ease;
            box-shadow: 0 4px 14px rgba(79, 70, 229, .3);
            letter-spacing: -.01em;
        }

        .btn-home:hover {
            background: var(--primary-hover);
            box-shadow: 0 6px 20px rgba(79, 70, 229, .4);
            transform: translateY(-1px);
        }

        .btn-home:active {
            transform: translateY(0);
        }

        /* ── Footer link ── */
        .footer-link {
            margin-top: 2rem;
            animation: fadeIn .6s ease .3s both;
        }

        .footer-link a {
            font-size: .85rem;
            font-weight: 600;
            color: var(--text-light);
            text-decoration: none;
            transition: color .2s;
        }

        .footer-link a:hover {
            color: var(--primary);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        /* ── Decorative dots ── */
        .dot-pattern {
            position: fixed;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            opacity: .04;
            pointer-events: none;
        }

        .dot-pattern-1 {
            top: -60px;
            right: -60px;
            background: var(--primary);
        }

        .dot-pattern-2 {
            bottom: -80px;
            left: -80px;
            background: var(--primary);
            width: 260px;
            height: 260px;
        }
    </style>
</head>
<body>

    {{-- Decorative background shapes --}}
    <div class="dot-pattern dot-pattern-1"></div>
    <div class="dot-pattern dot-pattern-2"></div>

    <div class="thanks-card">
        <div class="success-icon">🎉</div>
        <h1>Data Berhasil Terkirim!</h1>
        <p>
            Terima kasih atas partisipasi Anda dalam mengisi kuesioner penelitian ini.
            Jawaban Anda sangat berharga dan akan digunakan sepenuhnya untuk kepentingan
            penelitian akademik. Semua data yang Anda berikan dijamin kerahasiaannya.
        </p>
        <a href="{{ route('landing') }}" class="btn-home">Kembali ke Halaman Utama</a>
    </div>

    <div class="footer-link">
        <a href="{{ route('kuesioner.index') }}">← Kembali ke Dashboard Anda</a>
    </div>

</body>
</html>
