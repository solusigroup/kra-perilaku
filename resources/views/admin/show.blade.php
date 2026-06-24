<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Responden — Motivasi Akuntansi Admin</title>
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
            --success: #16a34a;
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
        .navbar-right { display: flex; align-items: center; gap: 18px; }
        .navbar-user { font-size: .875rem; color: var(--text-light); }
        .navbar-user strong { color: var(--text); font-weight: 600; }
        .nav-link {
            font-size: .875rem; font-weight: 600; color: var(--text-light);
            text-decoration: none; padding: 6px 14px; border-radius: 8px; transition: all .2s;
        }
        .nav-link:hover { color: var(--primary); background: rgba(79,70,229,.06); }
        .btn-logout {
            background: none; border: 1px solid var(--border); font-family: inherit;
            font-size: .8rem; font-weight: 600; color: var(--danger);
            padding: 6px 16px; border-radius: 8px; cursor: pointer; transition: all .2s;
        }
        .btn-logout:hover { background: #fef2f2; border-color: #fecaca; }

        /* ── Container ── */
        .container { max-width: 960px; margin: 0 auto; padding: 32px 24px 64px; }

        /* ── Back ── */
        .btn-back {
            display: inline-flex; align-items: center; gap: 6px;
            font-family: inherit; font-size: .85rem; font-weight: 600;
            color: var(--text-light); text-decoration: none;
            padding: 8px 18px; border-radius: 10px;
            border: 1px solid var(--border); background: var(--card-bg);
            transition: all .2s; margin-bottom: 24px;
        }
        .btn-back:hover { border-color: var(--primary); color: var(--primary); }

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
            font-size: 1.15rem; font-weight: 700;
            margin-bottom: 20px; color: var(--text);
            display: flex; align-items: center; gap: 10px;
        }
        .card-title .icon {
            width: 32px; height: 32px; border-radius: 8px;
            background: rgba(79,70,229,.08); color: var(--primary);
            display: flex; align-items: center; justify-content: center;
            font-size: .95rem; font-weight: 800;
        }

        /* ── Identity Grid ── */
        .identity-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 16px 24px;
        }
        .identity-item { }
        .identity-label {
            font-size: .72rem; font-weight: 600; text-transform: uppercase;
            letter-spacing: .6px; color: var(--text-light); margin-bottom: 3px;
        }
        .identity-value {
            font-size: .95rem; font-weight: 500; color: var(--text);
        }

        /* ── Dimension ── */
        .dim-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 16px; flex-wrap: wrap; gap: 8px;
        }
        .dim-title {
            font-size: 1.05rem; font-weight: 700; color: var(--text);
            display: flex; align-items: center; gap: 10px;
        }
        .dim-badge {
            display: inline-block; background: rgba(79,70,229,.08); color: var(--primary);
            font-weight: 800; font-size: .75rem; padding: 3px 10px; border-radius: 20px;
        }
        .dim-subtotal {
            font-size: .9rem; font-weight: 700; color: var(--primary);
            background: rgba(79,70,229,.06); padding: 6px 16px; border-radius: 8px;
        }
        .question-list { list-style: none; }
        .question-item {
            display: flex; align-items: flex-start; justify-content: space-between;
            gap: 12px; padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }
        .question-item:last-child { border-bottom: none; }
        .question-num {
            flex-shrink: 0; width: 26px; height: 26px; border-radius: 50%;
            background: var(--bg); color: var(--text-light);
            font-size: .72rem; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
        }
        .question-text { flex: 1; font-size: .88rem; color: var(--text); line-height: 1.5; }
        .score-pill {
            flex-shrink: 0;
            min-width: 36px; height: 28px;
            display: flex; align-items: center; justify-content: center;
            background: var(--primary); color: #fff;
            font-weight: 700; font-size: .8rem;
            border-radius: 20px;
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

        @keyframes fadeUp { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }

        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .container { padding: 20px 16px 48px; }
            .card { padding: 20px; }
            .identity-grid { grid-template-columns: 1fr; }
            .navbar-user { display: none; }
        }
    </style>
</head>
<body>
    {{-- ── Navbar ── --}}
    <nav class="navbar">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">✦ Motivasi Akuntansi Admin</a>
        <div class="navbar-right">
            <span class="navbar-user">
                <strong>{{ Auth::user()->name }}</strong> &middot; {{ Auth::user()->role ?? 'admin' }}
            </span>
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
            <a href="{{ route('admin.analysis') }}" class="nav-link">Analisis Data</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        {{-- ── Back ── --}}
        <a href="{{ route('admin.dashboard') }}" class="btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Dashboard
        </a>

        {{-- ── Identity Card ── --}}
        <div class="card">
            <div class="card-title">
                <span class="icon">ID</span>
                Identitas Responden
            </div>
            <div class="identity-grid">
                <div class="identity-item">
                    <div class="identity-label">Nama Lengkap</div>
                    <div class="identity-value">{{ $kuesioner->user->name }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Email</div>
                    <div class="identity-value">{{ $kuesioner->user->email }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Semester</div>
                    <div class="identity-value">Semester {{ $kuesioner->semester }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Jenis Kelamin</div>
                    <div class="identity-value">{{ $kuesioner->jenis_kelamin }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Latar Pendidikan</div>
                    <div class="identity-value">{{ $kuesioner->latar_pendidikan }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Pernah Belajar Akuntansi</div>
                    <div class="identity-value">{{ $kuesioner->pernah_belajar_akuntansi }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Pernah Pakai Software</div>
                    <div class="identity-value">{{ $kuesioner->pernah_pakai_software }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Aplikasi Digital</div>
                    <div class="identity-value">
                        @php
                            $apps = $kuesioner->aplikasi_digital;
                            if (is_string($apps)) {
                                $decoded = json_decode($apps, true);
                                $apps = is_array($decoded) ? $decoded : [$apps];
                            }
                        @endphp
                        {{ is_array($apps) ? implode(', ', $apps) : $apps }}
                    </div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Alasan Memilih Prodi</div>
                    <div class="identity-value">{{ $kuesioner->alasan_memilih_prodi }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Rencana Karier</div>
                    <div class="identity-value">{{ $kuesioner->rencana_karier }}</div>
                </div>
                <div class="identity-item">
                    <div class="identity-label">Waktu Pengisian</div>
                    <div class="identity-value">{{ $kuesioner->created_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>

        {{-- ── Dimensions ── --}}
        @php
            $dimensions = [
                [
                    'key' => 'D1',
                    'title' => 'Motivasi Awal',
                    'fields' => ['d1_1','d1_2','d1_3','d1_4','d1_5','d1_6'],
                    'max' => 30,
                    'questions' => [
                        'Saya memilih prodi akuntansi karena minat terhadap dunia keuangan dan bisnis.',
                        'Saya memilih akuntansi karena peluang kerja yang luas.',
                        'Saya memilih akuntansi karena meyakini profesi akuntan stabil.',
                        'Saya ingin bekerja di bidang akuntansi/audit/pajak/keuangan.',
                        'Saya merasa prodi ini sesuai dengan kemampuan akademik saya.',
                        'Keputusan saya dipengaruhi dorongan keluarga/guru/teman.',
                    ]
                ],
                [
                    'key' => 'D2',
                    'title' => 'Pergeseran Pandangan',
                    'fields' => ['d2_1','d2_2','d2_3','d2_4','d2_5'],
                    'max' => 25,
                    'questions' => [
                        'Sebelum kuliah, saya menganggap akuntan hanya melakukan pencatatan dan administrasi.',
                        'Sekarang saya memahami akuntan juga perlu kemampuan analisis dan pengambilan keputusan.',
                        'Pandangan saya tentang profesi akuntan berubah setelah menjalani perkuliahan.',
                        'Pemahaman saya tentang dunia akuntansi semakin realistis seiring waktu.',
                        'Saya mulai menyadari bahwa akuntansi berkaitan erat dengan teknologi digital.',
                    ]
                ],
                [
                    'key' => 'D3',
                    'title' => 'Persepsi Disrupsi Digital',
                    'fields' => ['d3_1','d3_2','d3_3','d3_4','d3_5','d3_6'],
                    'max' => 30,
                    'questions' => [
                        'Saya percaya AI dan otomatisasi akan menggantikan pekerjaan akuntansi yang bersifat rutin.',
                        'Teknologi digital membuat pekerjaan akuntan lebih menantang.',
                        'Saya khawatir pekerjaan di bidang akuntansi akan berkurang karena teknologi.',
                        'Meskipun ada teknologi, saya yakin profesi akuntan tidak akan hilang.',
                        'Disrupsi digital membuka peluang baru bagi lulusan akuntansi.',
                        'Mahasiswa akuntansi perlu memahami AI, cloud computing, dan analisis data.',
                    ]
                ],
                [
                    'key' => 'D4',
                    'title' => 'Penerimaan Teknologi',
                    'fields' => ['d4_1','d4_2','d4_3','d4_4','d4_5'],
                    'max' => 25,
                    'questions' => [
                        'Penggunaan aplikasi digital dalam akuntansi membantu meningkatkan efisiensi pekerjaan.',
                        'Teknologi akuntansi mudah dipelajari jika ada bimbingan yang memadai.',
                        'Penguasaan teknologi meningkatkan peluang kerja di bidang akuntansi.',
                        'Saya tertarik untuk mempelajari teknologi akuntansi lebih dalam.',
                        'Pembelajaran akuntansi di kampus perlu lebih banyak mengintegrasikan teknologi.',
                    ]
                ],
                [
                    'key' => 'D5',
                    'title' => 'Kesiapan Kompetensi',
                    'fields' => ['d5_1','d5_2','d5_3','d5_4','d5_5','d5_6'],
                    'max' => 30,
                    'questions' => [
                        'Saya merasa pemahaman dasar akuntansi saya sudah cukup untuk menghadapi dunia kerja.',
                        'Kemampuan digital saya saat ini sudah cukup untuk mendukung pekerjaan akuntansi.',
                        'Saya mampu menyesuaikan diri dengan perkembangan teknologi di bidang akuntansi.',
                        'Saya perlu meningkatkan kemampuan analisis data untuk bersaing di dunia kerja.',
                        'Saya perlu meningkatkan kemampuan berpikir kritis dalam menghadapi perubahan.',
                        'Saya bersedia mengikuti pelatihan atau sertifikasi tambahan di bidang akuntansi digital.',
                    ]
                ],
                [
                    'key' => 'D6',
                    'title' => 'Pengaruh Latar Belakang',
                    'fields' => ['d6_1','d6_2','d6_3','d6_4','d6_5'],
                    'max' => 25,
                    'questions' => [
                        'Latar belakang pendidikan SMA/SMK saya membantu dalam memahami materi akuntansi.',
                        'Mahasiswa yang pernah belajar akuntansi sebelumnya lebih mudah memahami perkuliahan.',
                        'Perbedaan latar belakang pendidikan memengaruhi kecepatan pemahaman mahasiswa.',
                        'Perkuliahan di prodi akuntansi mampu mengurangi kesenjangan antarlatarbelakang pendidikan.',
                        'Dosen dan kurikulum membantu mahasiswa dari berbagai latar belakang untuk beradaptasi.',
                    ]
                ],
            ];

            $grandTotal = 0;
        @endphp

        @foreach($dimensions as $dim)
            @php
                $subtotal = 0;
                foreach ($dim['fields'] as $f) {
                    $subtotal += (int) $kuesioner->$f;
                }
                $grandTotal += $subtotal;
            @endphp
            <div class="card">
                <div class="dim-header">
                    <div class="dim-title">
                        <span class="dim-badge">{{ $dim['key'] }}</span>
                        {{ $dim['title'] }}
                    </div>
                    <div class="dim-subtotal">{{ $subtotal }} / {{ $dim['max'] }}</div>
                </div>
                <ul class="question-list">
                    @foreach($dim['questions'] as $i => $qText)
                        @php $field = $dim['fields'][$i]; @endphp
                        <li class="question-item">
                            <span class="question-num">{{ $i + 1 }}</span>
                            <span class="question-text">{{ $qText }}</span>
                            <span class="score-pill">{{ $kuesioner->$field }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        {{-- ── Grand Total ── --}}
        <div class="grand-total">
            <div class="grand-total-label">Total Skor Keseluruhan</div>
            <div class="grand-total-value">{{ $grandTotal }} / 165</div>
        </div>
    </div>
</body>
</html>
