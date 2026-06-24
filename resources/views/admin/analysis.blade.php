<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Data & Kisi-kisi — Motivasi Akuntansi Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-light: #eef2ff;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text: #1e293b;
            --text-light: #64748b;
            --border: #e2e8f0;
            
            /* Status Colors */
            --success: #16a34a;
            --success-light: #f0fdf4;
            --warning: #ea580c;
            --warning-light: #fff7ed;
            --danger: #dc2626;
            --danger-light: #fef2f2;
            --info: #0284c7;
            --info-light: #f0f9ff;
            
            /* Likert Scale Colors */
            --scale-1: #ef4444; /* STS */
            --scale-2: #f97316; /* TS */
            --scale-3: #94a3b8; /* N */
            --scale-4: #6366f1; /* S */
            --scale-5: #10b981; /* SS */
            
            --radius: 12px;
            --shadow: 0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,.07), 0 2px 4px -2px rgba(0,0,0,.05);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,.08), 0 4px 6px -4px rgba(0,0,0,.04);
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
        .nav-link:hover, .nav-link.active { color: var(--primary); background: rgba(79,70,229,.06); }
        .btn-logout {
            background: none; border: 1px solid var(--border); font-family: inherit;
            font-size: .8rem; font-weight: 600; color: var(--danger);
            padding: 6px 16px; border-radius: 8px; cursor: pointer; transition: all .2s;
        }
        .btn-logout:hover { background: #fef2f2; border-color: #fecaca; }

        /* ── Container ── */
        .container { max-width: 1120px; margin: 0 auto; padding: 32px 24px 64px; }

        /* ── Header ── */
        .page-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 28px; flex-wrap: wrap; gap: 16px;
        }
        .page-title { font-size: 1.6rem; font-weight: 800; color: var(--text); letter-spacing: -0.5px; }
        .respondent-badge {
            background: var(--primary-light); color: var(--primary);
            font-weight: 700; font-size: .85rem; padding: 6px 16px; border-radius: 20px;
        }

        /* ── Grid Layouts ── */
        .grid-2 {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(480px, 1fr));
            gap: 24px; margin-bottom: 24px;
        }

        /* ── Cards ── */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 24px;
            margin-bottom: 24px;
            animation: fadeUp .35s ease;
        }
        .card-title {
            font-size: 1.1rem; font-weight: 700;
            margin-bottom: 18px; color: var(--text);
            display: flex; align-items: center; gap: 10px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 12px;
        }
        .card-title .icon {
            width: 28px; height: 28px; border-radius: 6px;
            background: rgba(79,70,229,.08); color: var(--primary);
            display: flex; align-items: center; justify-content: center;
            font-size: .9rem; font-weight: 800;
        }

        /* ── Alert/Notice Box ── */
        .research-notice {
            background: var(--info-light); border: 1px solid #bae6fd;
            color: #0369a1; border-radius: var(--radius); padding: 18px 20px;
            margin-bottom: 24px; font-size: .9rem;
        }
        .research-notice h4 { font-weight: 700; margin-bottom: 6px; display: flex; align-items: center; gap: 8px; }

        /* ── Reliability Card ── */
        .reliability-card {
            display: flex; align-items: center; justify-content: space-between;
            padding: 20px 24px; border-radius: var(--radius);
            margin-bottom: 24px; border: 1px solid var(--border);
            background: var(--card-bg); box-shadow: var(--shadow);
        }
        .reliability-info { display: flex; flex-direction: column; gap: 2px; }
        .reliability-label { font-size: .78rem; font-weight: 600; text-transform: uppercase; letter-spacing: .5px; color: var(--text-light); }
        .reliability-val { font-size: 1.8rem; font-weight: 800; color: var(--text); }
        .reliability-status {
            padding: 6px 14px; border-radius: 8px; font-weight: 600; font-size: .85rem;
        }
        .status-reliable { background: var(--success-light); color: var(--success); }
        .status-unreliable { background: var(--warning-light); color: var(--warning); }
        .status-none { background: var(--danger-light); color: var(--danger); }

        /* ── Progress Bars (Demographics) ── */
        .progress-list { display: flex; flex-direction: column; gap: 14px; }
        .progress-item { }
        .progress-header {
            display: flex; justify-content: space-between; font-size: .85rem;
            margin-bottom: 5px; font-weight: 500;
        }
        .progress-name { color: var(--text); }
        .progress-val { color: var(--text-light); font-weight: 600; }
        .progress-bg {
            height: 8px; background: var(--border); border-radius: 4px; overflow: hidden;
        }
        .progress-fill {
            height: 100%; background: var(--primary); border-radius: 4px;
        }

        /* ── Tables ── */
        .table-wrapper {
            width: 100%; overflow-x: auto; border: 1px solid var(--border); border-radius: var(--radius);
            background: var(--card-bg); margin-bottom: 24px; box-shadow: var(--shadow);
        }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: .9rem; }
        th, td { padding: 14px 18px; border-bottom: 1px solid var(--border); }
        th { background: #fafafa; font-weight: 600; color: var(--text); font-size: .82rem; text-transform: uppercase; letter-spacing: .5px; }
        tr:last-child td { border-bottom: none; }
        .badge {
            display: inline-block; padding: 4px 10px; border-radius: 6px; font-size: .78rem; font-weight: 600;
        }
        .badge-d { background: rgba(79,70,229,.08); color: var(--primary); font-weight: 700; }
        .badge-st { background: var(--success-light); color: var(--success); }
        .badge-t { background: var(--info-light); color: var(--info); }
        .badge-s { background: #f1f5f9; color: var(--text-light); }
        .badge-r { background: var(--warning-light); color: var(--warning); }
        .badge-sr { background: var(--danger-light); color: var(--danger); }

        /* ── Item Breakdown ── */
        .dim-section { margin-bottom: 28px; }
        .dim-section-title {
            font-size: 1.15rem; font-weight: 700; color: var(--text);
            margin-bottom: 16px; display: flex; align-items: center; gap: 8px;
        }
        .question-card {
            background: var(--card-bg); border: 1px solid var(--border);
            border-radius: var(--radius); padding: 18px 24px; margin-bottom: 14px;
            box-shadow: var(--shadow);
        }
        .q-header {
            display: flex; align-items: flex-start; justify-content: space-between;
            gap: 16px; margin-bottom: 14px;
        }
        .q-title { display: flex; align-items: flex-start; gap: 10px; font-size: .92rem; font-weight: 600; color: var(--text); }
        .q-num {
            display: flex; align-items: center; justify-content: center;
            width: 24px; height: 24px; border-radius: 50%; background: var(--border);
            font-size: .75rem; font-weight: 700; color: var(--text-light); flex-shrink: 0;
        }
        .q-mean {
            font-size: .88rem; font-weight: 700; color: var(--primary);
            background: var(--primary-light); padding: 4px 12px; border-radius: 6px;
            white-space: nowrap;
        }

        /* Stacked Bar Chart */
        .stacked-bar-container { display: flex; flex-direction: column; gap: 6px; }
        .stacked-bar {
            height: 18px; border-radius: 9px; overflow: hidden; display: flex;
            background: #f1f5f9;
        }
        .seg {
            height: 100%; display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: .68rem; font-weight: 700; transition: all .3s;
            position: relative;
        }
        .seg:hover { filter: brightness(0.92); cursor: pointer; }
        .seg-1 { background: var(--scale-1); }
        .seg-2 { background: var(--scale-2); }
        .seg-3 { background: var(--scale-3); }
        .seg-4 { background: var(--scale-4); }
        .seg-5 { background: var(--scale-5); }
        
        .bar-legend {
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 8px 16px; font-size: .75rem; color: var(--text-light);
            margin-top: 4px; border-top: 1px dashed var(--border); padding-top: 6px;
        }
        .leg-item { display: flex; align-items: center; gap: 4px; }
        .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }
        .dot-1 { background: var(--scale-1); }
        .dot-2 { background: var(--scale-2); }
        .dot-3 { background: var(--scale-3); }
        .dot-4 { background: var(--scale-4); }
        .dot-5 { background: var(--scale-5); }

        /* Discussion & Conclusion Box */
        .discussion-section {
            background: #fafafa; border: 1px solid var(--border); border-radius: var(--radius);
            padding: 24px; margin-bottom: 24px;
        }
        .disc-title { font-size: 1.15rem; font-weight: 800; margin-bottom: 16px; color: var(--text); border-bottom: 1px solid var(--border); padding-bottom: 10px; }
        .disc-item { margin-bottom: 20px; }
        .disc-item:last-child { margin-bottom: 0; }
        .disc-heading { font-weight: 700; font-size: .95rem; color: var(--primary); margin-bottom: 6px; }
        .disc-text { font-size: .9rem; color: #334155; line-height: 1.6; text-align: justify; }

        @keyframes fadeUp { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }

        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .container { padding: 20px 16px 48px; }
            .grid-2 { grid-template-columns: 1fr; gap: 16px; }
            .q-header { flex-direction: column; align-items: flex-start; gap: 8px; }
            .q-mean { align-self: flex-end; }
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
            <a href="{{ route('admin.analysis') }}" class="nav-link active">Analisis Data</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        {{-- ── Header ── --}}
        <div class="page-header">
            <h1 class="page-title">Analisis Data &amp; Statistik Deskriptif</h1>
            <div class="respondent-badge">Jumlah Responden: {{ $totalRespondents }} orang</div>
        </div>

        {{-- J. Saran Analisis Akhir (Riset Small N) --}}
        <div class="research-notice">
            <h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                Saran Analisis Akhir (Catatan Metodologis Riset)
            </h4>
            <p>Karena total responden penilitian ini dibatasi pada populasi kecil (N = {{ $totalRespondents }} mahasiswa - <em>total sampling</em>), hasil analisis ini sebaiknya <strong>tidak digeneralisasi terlalu luas</strong>. Dalam penulisan naskah akademik/pembahasan, disarankan menggunakan istilah-istilah penunjuk tren seperti <strong>"memberikan gambaran awal"</strong>, <strong>"menunjukkan kecenderungan"</strong>, atau <strong>"mengindikasikan adanya pola"</strong>. Harap hindari penyimpulan kausalitas mutlak seperti <em>"terbukti berpengaruh secara signifikan"</em>.</p>
        </div>

        @if($totalRespondents == 0)
            <div class="card">
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    </div>
                    <h2>Belum ada data masuk</h2>
                    <p>Statistik deskriptif, tabulasi silang, dan pembahasan otomatis akan ditampilkan setelah responden mengisi kuesioner.</p>
                </div>
            </div>
        @else
            {{-- ── Cronbach's Alpha Reliability ── --}}
            <div class="reliability-card">
                <div class="reliability-info">
                    <span class="reliability-label">Reliabilitas Instrumen (Cronbach's Alpha)</span>
                    <span class="reliability-val">
                        {{ is_null($cronbachAlpha) ? 'N/A' : number_format($cronbachAlpha, 3) }}
                    </span>
                </div>
                <div>
                    @if(is_null($cronbachAlpha))
                        <span class="reliability-status status-none">Butuh N >= 2 responden</span>
                    @elseif($cronbachAlpha >= 0.70)
                        <span class="reliability-status status-reliable">Reliabel (&ge; 0.70)</span>
                    @else
                        <span class="reliability-status status-unreliable">Kurang Reliabel (&lt; 0.70)</span>
                    @endif
                </div>
            </div>

            {{-- ── Demographics Section ── --}}
            <div class="grid-2">
                {{-- Semester & Jenis Kelamin --}}
                <div class="card">
                    <div class="card-title">
                        <span class="icon">S</span>
                        Semester &amp; Jenis Kelamin
                    </div>
                    <div style="display:flex; flex-direction:column; gap:24px">
                        <div>
                            <h4 style="font-size:.85rem; text-transform:uppercase; color:var(--text-light); margin-bottom:10px">Semester Responden</h4>
                            <div class="progress-list">
                                @foreach($semesterCounts as $sem => $count)
                                    @php $pct = $totalRespondents > 0 ? ($count / $totalRespondents) * 100 : 0; @endphp
                                    <div class="progress-item">
                                        <div class="progress-header">
                                            <span class="progress-name">{{ $sem }}</span>
                                            <span class="progress-val">{{ $count }} orang ({{ number_format($pct, 2) }}%)</span>
                                        </div>
                                        <div class="progress-bg">
                                            <div class="progress-fill" style="width: {{ $pct }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h4 style="font-size:.85rem; text-transform:uppercase; color:var(--text-light); margin-bottom:10px">Jenis Kelamin</h4>
                            <div class="progress-list">
                                @foreach($genderCounts as $gen => $count)
                                    @php $pct = $totalRespondents > 0 ? ($count / $totalRespondents) * 100 : 0; @endphp
                                    <div class="progress-item">
                                        <div class="progress-header">
                                            <span class="progress-name">{{ $gen }}</span>
                                            <span class="progress-val">{{ $count }} orang ({{ number_format($pct, 2) }}%)</span>
                                        </div>
                                        <div class="progress-bg">
                                            <div class="progress-fill" style="width: {{ $pct }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Latar Pendidikan & Pengalaman Akuntansi --}}
                <div class="card">
                    <div class="card-title">
                        <span class="icon">L</span>
                        Latar Pendidikan &amp; Pengalaman Akuntansi
                    </div>
                    <div style="display:flex; flex-direction:column; gap:24px">
                        <div>
                            <h4 style="font-size:.85rem; text-transform:uppercase; color:var(--text-light); margin-bottom:10px">Latar Pendidikan Sebelum Kuliah</h4>
                            <div class="progress-list">
                                @foreach($latarCounts as $latar => $count)
                                    @php $pct = $totalRespondents > 0 ? ($count / $totalRespondents) * 100 : 0; @endphp
                                    <div class="progress-item">
                                        <div class="progress-header">
                                            <span class="progress-name">{{ $latar }}</span>
                                            <span class="progress-val">{{ $count }} orang ({{ number_format($pct, 2) }}%)</span>
                                        </div>
                                        <div class="progress-bg">
                                            <div class="progress-fill" style="width: {{ $pct }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px">
                            <div>
                                <h4 style="font-size:.78rem; text-transform:uppercase; color:var(--text-light); margin-bottom:8px">Pernah Belajar Akuntansi</h4>
                                <div class="progress-list">
                                    @foreach($belajarCounts as $key => $count)
                                        @php $pct = $totalRespondents > 0 ? ($count / $totalRespondents) * 100 : 0; @endphp
                                        <div class="progress-item">
                                            <div class="progress-header" style="font-size:.78rem">
                                                <span>{{ $key }}</span>
                                                <span>{{ number_format($pct, 1) }}%</span>
                                            </div>
                                            <div class="progress-bg" style="height:6px">
                                                <div class="progress-fill" style="width: {{ $pct }}%"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <h4 style="font-size:.78rem; text-transform:uppercase; color:var(--text-light); margin-bottom:8px">Pernah Pakai Software</h4>
                                <div class="progress-list">
                                    @foreach($softwareCounts as $key => $count)
                                        @php $pct = $totalRespondents > 0 ? ($count / $totalRespondents) * 100 : 0; @endphp
                                        <div class="progress-item">
                                            <div class="progress-header" style="font-size:.78rem">
                                                <span>{{ $key }}</span>
                                                <span>{{ number_format($pct, 1) }}%</span>
                                            </div>
                                            <div class="progress-bg" style="height:6px">
                                                <div class="progress-fill" style="width: {{ $pct }}%"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── Dimension Stats Table ── --}}
            <div class="card" style="padding:0; overflow:hidden">
                <div style="padding:24px 24px 12px 24px">
                    <h3 style="font-size:1.1rem; font-weight:700; color:var(--text); display:flex; align-items:center; gap:10px">
                        <span class="icon" style="width: 28px; height: 28px; border-radius: 6px; background: rgba(79,70,229,.08); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: .9rem; font-weight: 800">D</span>
                        Statistik Deskriptif per Dimensi (Rata-Rata Aspek)
                    </h3>
                </div>
                <div style="overflow-x:auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Dimensi/Aspek</th>
                                <th>Indikator Aspek</th>
                                <th style="text-align:right">Rata-rata Aspek</th>
                                <th style="text-align:right">SD</th>
                                <th style="text-align:right">Min</th>
                                <th style="text-align:right">Max</th>
                                <th style="text-align:center">Interpretasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dimIndicators = [
                                    'D1' => 'Minat, peluang kerja, stabilitas, pengaruh sosial, kesesuaian kemampuan',
                                    'D2' => 'Perubahan pandangan dari administrasi ke analisis strategis',
                                    'D3' => 'Pandangan terhadap AI, otomatisasi, peluang dan ancaman teknologi',
                                    'D4' => 'Kegunaan, kemudahan, minat belajar teknologi akuntansi',
                                    'D5' => 'Kesiapan akuntansi, kemampuan digital, analisis data, soft skills',
                                    'D6' => 'Pengaruh asal sekolah terhadap adaptasi dan pemahaman awal',
                                ];
                            @endphp
                            @foreach($dimensionStats as $key => $stat)
                                @php
                                    $numItems = $stat['mean_item'] > 0 ? $stat['mean_total'] / $stat['mean_item'] : 1;
                                @endphp
                                <tr>
                                    <td><span class="badge badge-d">{{ $key }}</span></td>
                                    <td><strong>{{ $stat['title'] }}</strong></td>
                                    <td><span style="font-size:.78rem; color:var(--text-light)">{{ $dimIndicators[$key] }}</span></td>
                                    <td style="text-align:right; font-weight:700; color:var(--primary)">{{ number_format($stat['mean_item'], 2) }}</td>
                                    <td style="text-align:right">{{ number_format($stat['sd'], 2) }}</td>
                                    <td style="text-align:right">{{ number_format($stat['min'] / $numItems, 2) }}</td>
                                    <td style="text-align:right">{{ number_format($stat['max'] / $numItems, 2) }}</td>
                                    <td style="text-align:center">
                                        @if($stat['interpretation'] === 'Sangat Tinggi')
                                            <span class="badge badge-st">Sangat Tinggi</span>
                                        @elseif($stat['interpretation'] === 'Tinggi')
                                            <span class="badge badge-t">Tinggi</span>
                                        @elseif($stat['interpretation'] === 'Sedang')
                                            <span class="badge badge-s">Sedang</span>
                                        @elseif($stat['interpretation'] === 'Rendah')
                                            <span class="badge badge-r">Rendah</span>
                                        @else
                                            <span class="badge badge-sr">Sangat Rendah</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ── Cross Tabulation Tables ── --}}
            <div class="grid-2">
                {{-- 5. Tabulasi Silang Berdasarkan Semester --}}
                <div class="card" style="padding:0; overflow:hidden">
                    <div style="padding:24px 24px 12px 24px">
                        <h3 style="font-size:1.05rem; font-weight:700; color:var(--text); display:flex; align-items:center; gap:8px">
                            <span class="icon" style="width: 26px; height: 26px; border-radius: 6px; background: rgba(79,70,229,.08); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: .85rem; font-weight: 800">T1</span>
                            Tabulasi Silang Rata-Rata per Semester
                        </h3>
                    </div>
                    <div style="overflow-x:auto">
                        <table>
                            <thead>
                                <tr>
                                    <th>Aspek/Dimensi</th>
                                    <th style="text-align:right">Semester 2</th>
                                    <th style="text-align:right">Semester 4</th>
                                    <th style="text-align:right">Semester 6</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($crossSemester as $key => $row)
                                    <tr>
                                        <td><strong>{{ $row['title'] }}</strong> <span class="badge badge-d" style="font-size:.65rem; padding:1px 5px">{{ $key }}</span></td>
                                        <td style="text-align:right; font-weight:{{ $row['Semester 2'] > 0 ? '600' : 'normal' }}">{{ $row['Semester 2'] > 0 ? number_format($row['Semester 2'], 2) : '-' }}</td>
                                        <td style="text-align:right; font-weight:{{ $row['Semester 4'] > 0 ? '600' : 'normal' }}">{{ $row['Semester 4'] > 0 ? number_format($row['Semester 4'], 2) : '-' }}</td>
                                        <td style="text-align:right; font-weight:{{ $row['Semester 6'] > 0 ? '600' : 'normal' }}">{{ $row['Semester 6'] > 0 ? number_format($row['Semester 6'], 2) : '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- 6. Tabulasi Silang Berdasarkan Latar Belakang Pendidikan --}}
                <div class="card" style="padding:0; overflow:hidden">
                    <div style="padding:24px 24px 12px 24px">
                        <h3 style="font-size:1.05rem; font-weight:700; color:var(--text); display:flex; align-items:center; gap:8px">
                            <span class="icon" style="width: 26px; height: 26px; border-radius: 6px; background: rgba(79,70,229,.08); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: .85rem; font-weight: 800">T2</span>
                            Tabulasi Silang Latar Belakang Pendidikan
                        </h3>
                    </div>
                    <div style="overflow-x:auto">
                        <table>
                            <thead>
                                <tr>
                                    <th>Aspek/Dimensi</th>
                                    <th style="text-align:right">Pernah Belajar Akuntansi</th>
                                    <th style="text-align:right">Belum Pernah Belajar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($crossBelajar as $key => $row)
                                    <tr>
                                        <td><strong>{{ $row['title'] }}</strong> <span class="badge badge-d" style="font-size:.65rem; padding:1px 5px">{{ $key }}</span></td>
                                        <td style="text-align:right">{{ number_format($row['Ya'], 2) }}</td>
                                        <td style="text-align:right">{{ number_format($row['Tidak'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- G & H. Teknik Pembahasan Hasil & Dasar Pengambilan Kesimpulan --}}
            <div class="discussion-section">
                <h3 class="disc-title">Pembahasan Hasil &amp; Kesimpulan Penelitian (Otomatis)</h3>
                
                {{-- Pembahasan 1: Motivasi memilih prodi --}}
                <div class="disc-item">
                    <div class="disc-heading">1. Motivasi Mahasiswa Memilih Program Studi Akuntansi</div>
                    <div class="disc-text">
                        Rata-rata aspek motivasi memilih Program Studi Akuntansi (D1) berada pada kategori 
                        <strong>{{ strtolower($dimensionStats['D1']['interpretation']) }}</strong> dengan skor sebesar <strong>{{ number_format($dimensionStats['D1']['mean_item'], 2) }}</strong>. 
                        @if($dimensionStats['D1']['mean_item'] >= 3.41)
                            Data ini mengindikasikan adanya kecenderungan bahwa mahasiswa Prodi Akuntansi Universitas Bina Sehat PPNI memiliki motivasi yang tinggi dalam memilih jurusan Akuntansi. Motivasi tersebut didorong oleh minat pribadi, peluang kerja, dan persepsi bahwa profesi akuntansi masih memiliki stabilitas karier yang terjamin di masa depan. Temuan ini mendukung pandangan bahwa Akuntansi masih dipersepsikan sebagai jurusan yang memiliki prospek kerja luas sekalipun berada di era disrupsi digital.
                        @else
                            Skor ini menunjukkan kecenderungan tingkat motivasi yang sedang/cukup rendah pada mahasiswa dalam menetapkan Akuntansi sebagai pilihan studi, yang menandakan bahwa faktor-faktor lain di luar minat murni atau prospek kerja memiliki peranan yang dinamis.
                        @endif
                    </div>
                </div>

                {{-- Pembahasan 2: Persepsi terhadap disrupsi digital --}}
                @php
                    $meanDigital = ($dimensionStats['D3']['mean_item'] + $dimensionStats['D4']['mean_item']) / 2;
                @endphp
                <div class="disc-item">
                    <div class="disc-heading">2. Persepsi Mahasiswa terhadap Disrupsi Digital dan Penerimaan Teknologi</div>
                    <div class="disc-text">
                        Rata-rata gabungan dari aspek persepsi disrupsi digital (D3: <strong>{{ number_format($dimensionStats['D3']['mean_item'], 2) }}</strong>) dan penerimaan teknologi (D4: <strong>{{ number_format($dimensionStats['D4']['mean_item'], 2) }}</strong>) adalah sebesar <strong>{{ number_format($meanDigital, 2) }}</strong>.
                        @if($meanDigital >= 3.41)
                            Berdasarkan data yang terkumpul, mahasiswa memandang disrupsi digital bukan sebagai ancaman total terhadap eksistensi profesi akuntan. Sebaliknya, mereka melihat teknologi sebagai alat bantu (tool) yang mempermudah efisiensi kerja akuntansi serta membuka peluang karier baru bagi lulusan yang adaptif. Ada optimisme digital yang kuat di mana responden menunjukkan kemauan tinggi untuk mempelajari AI, cloud accounting, dan analisis data dalam pembelajaran akuntansi.
                        @else
                            Data memberikan gambaran awal bahwa mahasiswa masih bersikap netral atau menyimpan kekhawatiran tertentu terhadap peran AI dan otomatisasi yang berpotensi membatasi ruang gerak profesi akuntansi di masa depan.
                        @endif
                    </div>
                </div>

                {{-- Pembahasan 3: Lintas Semester dan Asal Sekolah --}}
                <div class="disc-item">
                    <div class="disc-heading">3. Perbedaan Pandangan Lintas Semester dan Latar Belakang Pendidikan</div>
                    <div class="disc-text">
                        @php
                            $sem2D2 = $crossSemester['D2']['Semester 2'];
                            $sem6D2 = $crossSemester['D2']['Semester 6'];
                            $belajarD6_Ya = $crossBelajar['D6']['Ya'];
                            $belajarD6_Tidak = $crossBelajar['D6']['Tidak'];
                        @endphp
                        
                        {{-- Analisis Lintas Semester --}}
                        @if($sem6D2 > $sem2D2 && $sem2D2 > 0)
                            Melalui tabulasi silang lintas semester (Tabel T1), ditemukan pola di mana mahasiswa semester 6 memiliki rata-rata pergeseran paradigma karier (D2) sebesar <strong>{{ number_format($sem6D2, 2) }}</strong>, lebih tinggi dibanding mahasiswa semester 2 yang sebesar <strong>{{ number_format($sem2D2, 2) }}</strong>. Hal ini mengindikasikan adanya kecenderungan <strong>pergeseran paradigma</strong> dari orientasi awal yang cenderung administratif/klasik menuju orientasi karier yang lebih dinamis, strategis, dan melek teknologi seiring bertambahnya usia perkuliahan.
                        @else
                            Data lintas semester menunjukkan kecenderungan pola yang relatif homogen antara mahasiswa semester awal dan semester akhir dalam memandang aspek paradigma karier akuntansi.
                        @endif
                        
                        {{-- Analisis Latar Belakang Pendidikan --}}
                        @if($belajarD6_Ya != $belajarD6_Tidak)
                            Sementara itu, analisis berdasarkan latar belakang sekolah sebelum kuliah (Tabel T2) memperlihatkan bahwa responden yang pernah belajar akuntansi memiliki rata-rata kesiapan latar belakang (D6) sebesar <strong>{{ number_format($belajarD6_Ya, 2) }}</strong> dibandingkan mereka yang belum pernah belajar akuntansi sebelumnya sebesar <strong>{{ number_format($belajarD6_Tidak, 2) }}</strong>. Pola ini mengindikasikan bahwa latar belakang pendidikan sebelum kuliah memengaruhi kesiapan awal mahasiswa dalam memahami materi akuntansi dasar, namun proses pembelajaran dan bimbingan dosen di kampus berperan krusial dalam meminimalisir kesenjangan pemahaman tersebut seiring berjalannya waktu.
                        @endif
                    </div>
                </div>
            </div>

            {{-- ── Item Stats Breakdown ── --}}
            @php
                $instruments = [
                    [
                        'key' => 'D1',
                        'title' => 'Dimensi 1: Motivasi memilih Akuntansi (Item 1-6)',
                        'prefix' => 'd1',
                        'start_num' => 1,
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
                        'title' => 'Dimensi 2: Pergeseran paradigma karier (Item 7-11)',
                        'prefix' => 'd2',
                        'start_num' => 7,
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
                        'title' => 'Dimensi 3: Persepsi disrupsi digital (Item 12-17)',
                        'prefix' => 'd3',
                        'start_num' => 12,
                        'questions' => [
                            'Saya percaya AI dan otomatisasi akan menggantikan pekerjaan akuntansi yang bersifat rutin.',
                            'Teknologi digital membuat pekerjaan akuntan lebih menantang.',
                            'Saya khawatir pekerjaan di bidang akuntansi akan berkurang karena teknologi.',
                            'Meskipun ada teknologi, saya yakin profesi akuntan tidak akan hilang.',
                            'Disrupsi digital membuka peluang baru bagi lulusan akuntansi.',
                            'Mahasiswa akuntansi perlu memahami AI, cloud accounting, dan analisis data.',
                        ]
                    ],
                    [
                        'key' => 'D4',
                        'title' => 'Dimensi 4: Penerimaan teknologi (Item 18-22)',
                        'prefix' => 'd4',
                        'start_num' => 18,
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
                        'title' => 'Dimensi 5: Kesiapan kompetensi (Item 23-28)',
                        'prefix' => 'd5',
                        'start_num' => 23,
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
                        'title' => 'Dimensi 6: Latar belakang pendidikan (Item 29-33)',
                        'prefix' => 'd6',
                        'start_num' => 29,
                        'questions' => [
                            'Latar belakang pendidikan SMA/SMK saya membantu dalam memahami materi akuntansi.',
                            'Mahasiswa yang pernah belajar akuntansi sebelumnya lebih mudah memahami perkuliahan.',
                            'Perbedaan latar belakang pendidikan memengaruhi kecepatan pemahaman mahasiswa.',
                            'Perkuliahan di prodi akuntansi mampu mengurangi kesenjangan antarlatarbelakang pendidikan.',
                            'Dosen dan kurikulum membantu mahasiswa dari berbagai latar belakang untuk beradaptasi.',
                        ]
                    ]
                ];
                
                $absoluteItemCounter = 1;
            @endphp

            @foreach($instruments as $ins)
                <div class="dim-section">
                    <h2 class="dim-section-title">
                        <span class="badge badge-d" style="font-size:.9rem; padding:5px 12px">{{ $ins['key'] }}</span>
                        {{ $ins['title'] }}
                    </h2>

                    @foreach($ins['questions'] as $idx => $qtext)
                        @php
                            $fname = $ins['prefix'] . '_' . ($idx + 1);
                            $stats = $itemStats[$fname];
                            $mean = $stats['mean'];
                            $freq = $stats['freq'];
                            $currentNum = $absoluteItemCounter++;
                        @endphp
                        <div class="question-card">
                            <div class="q-header">
                                <div class="q-title">
                                    <span class="q-num">{{ $currentNum }}</span>
                                    <span>{{ $qtext }}</span>
                                </div>
                                <span class="q-mean">Mean: {{ number_format($mean, 2) }}</span>
                            </div>

                            <div class="stacked-bar-container">
                                <div class="stacked-bar">
                                    @for($s = 1; $s <= 5; $s++)
                                        @php 
                                            $cnt = $freq[$s];
                                            $pct = $totalRespondents > 0 ? ($cnt / $totalRespondents) * 100 : 0;
                                        @endphp
                                        @if($pct > 0)
                                            <div class="seg seg-{{ $s }}" style="width: {{ $pct }}%" title="Skor {{ $s }}: {{ $cnt }} orang ({{ number_format($pct, 2) }}%)">
                                                @if($pct >= 6)
                                                    {{ number_format($pct, 1) }}%
                                                @endif
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                                <div class="bar-legend">
                                    <span class="leg-item"><span class="dot dot-1"></span> STS: {{ $freq[1] }} org ({{ number_format($totalRespondents > 0 ? ($freq[1]/$totalRespondents)*100 : 0, 1) }}%)</span>
                                    <span class="leg-item"><span class="dot dot-2"></span> TS: {{ $freq[2] }} org ({{ number_format($totalRespondents > 0 ? ($freq[2]/$totalRespondents)*100 : 0, 1) }}%)</span>
                                    <span class="leg-item"><span class="dot dot-3"></span> N: {{ $freq[3] }} org ({{ number_format($totalRespondents > 0 ? ($freq[3]/$totalRespondents)*100 : 0, 1) }}%)</span>
                                    <span class="leg-item"><span class="dot dot-4"></span> S: {{ $freq[4] }} org ({{ number_format($totalRespondents > 0 ? ($freq[4]/$totalRespondents)*100 : 0, 1) }}%)</span>
                                    <span class="leg-item"><span class="dot dot-5"></span> SS: {{ $freq[5] }} org ({{ number_format($totalRespondents > 0 ? ($freq[5]/$totalRespondents)*100 : 0, 1) }}%)</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
