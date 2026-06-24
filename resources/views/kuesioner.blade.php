<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuesioner Saya — Motivasi Akuntansi</title>
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
            --danger: #dc2626;
            --radius: 12px;
            --shadow: 0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,.07), 0 2px 4px -2px rgba(0,0,0,.05);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
        }

        /* ── Navbar ── */
        .navbar {
            position: sticky; top: 0; z-index: 100;
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow);
            padding: 0 24px; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .navbar-brand {
            font-weight: 800; font-size: 1.15rem;
            color: var(--primary); text-decoration: none; letter-spacing: -0.3px;
        }
        .navbar-right { display: flex; align-items: center; gap: 14px; }
        .btn-logout {
            background: none; border: 1px solid var(--border); font-family: inherit;
            font-size: .8rem; font-weight: 600; color: var(--danger);
            padding: 6px 16px; border-radius: 8px; cursor: pointer; transition: all .2s;
        }
        .btn-logout:hover { background: #fef2f2; border-color: #fecaca; }

        /* ── Container ── */
        .container { max-width: 800px; margin: 0 auto; padding: 32px 24px 64px; }

        .page-title {
            font-size: 1.5rem; font-weight: 800; letter-spacing: -0.5px;
            color: var(--text); margin-bottom: 8px;
        }
        .page-subtitle {
            font-size: .9rem; color: var(--text-light); margin-bottom: 28px;
        }

        /* ── Cards ── */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 28px 32px;
            margin-bottom: 24px;
            animation: fadeUp .35s ease;
        }
        .card-title {
            font-size: 1.05rem; font-weight: 700;
            margin-bottom: 18px; color: var(--text);
            display: flex; align-items: center; gap: 10px;
        }
        .card-title .icon {
            width: 30px; height: 30px; border-radius: 8px;
            background: rgba(79,70,229,.08); color: var(--primary);
            display: flex; align-items: center; justify-content: center;
            font-size: .85rem; font-weight: 800;
        }

        /* ── Identity ── */
        .identity-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 14px 24px;
        }
        .identity-label {
            font-size: .72rem; font-weight: 600; text-transform: uppercase;
            letter-spacing: .6px; color: var(--text-light); margin-bottom: 3px;
        }
        .identity-value { font-size: .9rem; font-weight: 500; color: var(--text); }

        /* ── Dimension Row ── */
        .dim-row {
            display: flex; align-items: center; justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid var(--border);
        }
        .dim-row:last-child { border-bottom: none; }
        .dim-info { display: flex; align-items: center; gap: 12px; }
        .dim-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 36px; height: 36px; border-radius: 8px;
            background: rgba(79,70,229,.08); color: var(--primary);
            font-weight: 800; font-size: .78rem;
        }
        .dim-name { font-size: .9rem; font-weight: 600; color: var(--text); }
        .dim-score {
            font-size: .9rem; font-weight: 700; color: var(--primary);
            background: rgba(79,70,229,.06); padding: 5px 14px; border-radius: 8px;
            white-space: nowrap;
        }

        /* ── Grand Total ── */
        .grand-total {
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            color: #fff; border-radius: var(--radius);
            padding: 28px 32px; text-align: center;
            box-shadow: var(--shadow-md);
            animation: fadeUp .4s ease;
        }
        .grand-total-label { font-size: .9rem; font-weight: 400; opacity: .85; margin-bottom: 4px; }
        .grand-total-value { font-size: 2.2rem; font-weight: 800; letter-spacing: -1px; }

        /* ── Empty State ── */
        .empty-state {
            text-align: center; padding: 60px 24px;
        }
        .empty-icon {
            width: 72px; height: 72px; margin: 0 auto 20px;
            border-radius: 50%;
            background: rgba(79,70,229,.06);
            display: flex; align-items: center; justify-content: center;
        }
        .empty-icon svg { width: 32px; height: 32px; color: var(--primary); opacity: .5; }
        .empty-state h2 {
            font-size: 1.15rem; font-weight: 700; margin-bottom: 8px; color: var(--text);
        }
        .empty-state p { font-size: .9rem; color: var(--text-light); margin-bottom: 20px; }
        .btn {
            display: inline-flex; align-items: center; gap: 6px;
            font-family: inherit; font-size: .85rem; font-weight: 600;
            padding: 10px 24px; border-radius: 10px; border: none;
            cursor: pointer; text-decoration: none; transition: all .2s;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-hover); transform: translateY(-1px); box-shadow: var(--shadow-md); }

        @keyframes fadeUp { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }

        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .container { padding: 20px 16px 48px; }
            .card { padding: 20px; }
            .identity-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    {{-- ── Navbar ── --}}
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="navbar-brand">✦ Motivasi Akuntansi</a>
        <div class="navbar-right">
            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">Hasil Kuesioner Saya</h1>
        <p class="page-subtitle">Berikut adalah ringkasan jawaban kuesioner yang telah Anda isi.</p>

        @if($kuesioners->isEmpty())
            {{-- ── Empty State ── --}}
            <div class="card">
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                    </div>
                    <h2>Anda belum mengisi kuesioner</h2>
                    <p>Silakan isi kuesioner terlebih dahulu untuk melihat hasil di halaman ini.</p>
                    <a href="{{ route('kuesioner.create') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                        Isi Kuesioner
                    </a>
                </div>
            </div>
        @else
            @php $k = $kuesioners->first(); @endphp

            {{-- ── Identity Card ── --}}
            <div class="card">
                <div class="card-title">
                    <span class="icon">ID</span>
                    Identitas Anda
                </div>
                <div class="identity-grid">
                    <div>
                        <div class="identity-label">Semester</div>
                        <div class="identity-value">Semester {{ $k->semester }}</div>
                    </div>
                    <div>
                        <div class="identity-label">Jenis Kelamin</div>
                        <div class="identity-value">{{ $k->jenis_kelamin }}</div>
                    </div>
                    <div>
                        <div class="identity-label">Latar Pendidikan</div>
                        <div class="identity-value">{{ $k->latar_pendidikan }}</div>
                    </div>
                    <div>
                        <div class="identity-label">Pernah Belajar Akuntansi</div>
                        <div class="identity-value">{{ $k->pernah_belajar_akuntansi }}</div>
                    </div>
                    <div>
                        <div class="identity-label">Pernah Pakai Software</div>
                        <div class="identity-value">{{ $k->pernah_pakai_software }}</div>
                    </div>
                    <div>
                        <div class="identity-label">Aplikasi Digital</div>
                        <div class="identity-value">
                            @php
                                $apps = $k->aplikasi_digital;
                                if (is_string($apps)) {
                                    $decoded = json_decode($apps, true);
                                    $apps = is_array($decoded) ? $decoded : [$apps];
                                }
                            @endphp
                            {{ is_array($apps) ? implode(', ', $apps) : $apps }}
                        </div>
                    </div>
                    <div>
                        <div class="identity-label">Alasan Memilih Prodi</div>
                        <div class="identity-value">{{ $k->alasan_memilih_prodi }}</div>
                    </div>
                    <div>
                        <div class="identity-label">Rencana Karier</div>
                        <div class="identity-value">{{ $k->rencana_karier }}</div>
                    </div>
                    <div>
                        <div class="identity-label">Waktu Pengisian</div>
                        <div class="identity-value">{{ $k->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
            </div>

            {{-- ── Dimension Scores ── --}}
            @php
                $dimensions = [
                    ['key' => 'D1', 'title' => 'Motivasi Awal', 'fields' => ['d1_1','d1_2','d1_3','d1_4','d1_5','d1_6'], 'max' => 30],
                    ['key' => 'D2', 'title' => 'Pergeseran Pandangan', 'fields' => ['d2_1','d2_2','d2_3','d2_4','d2_5'], 'max' => 25],
                    ['key' => 'D3', 'title' => 'Persepsi Disrupsi Digital', 'fields' => ['d3_1','d3_2','d3_3','d3_4','d3_5','d3_6'], 'max' => 30],
                    ['key' => 'D4', 'title' => 'Penerimaan Teknologi', 'fields' => ['d4_1','d4_2','d4_3','d4_4','d4_5'], 'max' => 25],
                    ['key' => 'D5', 'title' => 'Kesiapan Kompetensi', 'fields' => ['d5_1','d5_2','d5_3','d5_4','d5_5','d5_6'], 'max' => 30],
                    ['key' => 'D6', 'title' => 'Pengaruh Latar Belakang', 'fields' => ['d6_1','d6_2','d6_3','d6_4','d6_5'], 'max' => 25],
                ];
                $grandTotal = 0;
            @endphp

            <div class="card">
                <div class="card-title">
                    <span class="icon">★</span>
                    Skor Per Dimensi
                </div>

                @foreach($dimensions as $dim)
                    @php
                        $subtotal = 0;
                        foreach ($dim['fields'] as $f) {
                            $subtotal += (int) $k->$f;
                        }
                        $grandTotal += $subtotal;
                    @endphp
                    <div class="dim-row">
                        <div class="dim-info">
                            <span class="dim-badge">{{ $dim['key'] }}</span>
                            <span class="dim-name">{{ $dim['title'] }}</span>
                        </div>
                        <span class="dim-score">{{ $subtotal }} / {{ $dim['max'] }}</span>
                    </div>
                @endforeach
            </div>

            {{-- ── Grand Total ── --}}
            <div class="grand-total">
                <div class="grand-total-label">Total Skor Keseluruhan</div>
                <div class="grand-total-value">{{ $grandTotal }} / 165</div>
            </div>
        @endif
    </div>
</body>
</html>
