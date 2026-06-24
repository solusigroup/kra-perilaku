<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin — Motivasi Akuntansi</title>
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
            --success-hover: #15803d;
            --danger: #dc2626;
            --danger-hover: #b91c1c;
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
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow);
            padding: 0 24px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -0.3px;
        }
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .navbar-user {
            font-size: .875rem;
            color: var(--text-light);
        }
        .navbar-user strong {
            color: var(--text);
            font-weight: 600;
        }
        .nav-link {
            font-size: .875rem;
            font-weight: 600;
            color: var(--text-light);
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 8px;
            transition: all .2s;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary);
            background: rgba(79,70,229,.06);
        }
        .btn-logout {
            background: none;
            border: 1px solid var(--border);
            font-family: inherit;
            font-size: .8rem;
            font-weight: 600;
            color: var(--danger);
            padding: 6px 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: all .2s;
        }
        .btn-logout:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        /* ── Container ── */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 32px 24px 64px;
        }

        /* ── Header ── */
        .page-header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 28px;
        }
        .page-title {
            font-size: 1.65rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: var(--text);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: inherit;
            font-size: .85rem;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all .2s;
        }
        .btn-primary {
            background: var(--primary);
            color: #fff;
        }
        .btn-primary:hover { background: var(--primary-hover); transform: translateY(-1px); box-shadow: var(--shadow-md); }
        .btn-success {
            background: var(--success);
            color: #fff;
        }
        .btn-success:hover { background: var(--success-hover); transform: translateY(-1px); box-shadow: var(--shadow-md); }
        .btn-danger {
            background: var(--danger);
            color: #fff;
            padding: 6px 14px;
            font-size: .78rem;
        }
        .btn-danger:hover { background: var(--danger-hover); }
        .btn-outline {
            background: var(--card-bg);
            color: var(--text-light);
            border: 1px solid var(--border);
        }
        .btn-outline:hover { border-color: var(--primary); color: var(--primary); }

        /* ── Alert ── */
        .alert {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 14px 20px;
            border-radius: var(--radius);
            font-size: .9rem;
            font-weight: 500;
            margin-bottom: 24px;
            animation: fadeIn .3s ease;
        }

        /* ── Filter ── */
        .filter-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 20px 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow);
        }
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            gap: 14px;
        }
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
            flex: 1;
            min-width: 180px;
        }
        .filter-label {
            font-size: .78rem;
            font-weight: 600;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        .filter-input, .filter-select {
            font-family: inherit;
            font-size: .875rem;
            padding: 9px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--bg);
            color: var(--text);
            outline: none;
            transition: border-color .2s;
        }
        .filter-input:focus, .filter-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,.1);
        }
        .filter-actions {
            display: flex;
            gap: 8px;
            align-items: flex-end;
        }

        /* ── Table ── */
        .table-wrapper {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: .875rem;
        }
        thead th {
            background: var(--bg);
            font-weight: 600;
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: var(--text-light);
            padding: 14px 16px;
            text-align: left;
            white-space: nowrap;
            border-bottom: 2px solid var(--border);
        }
        tbody td {
            padding: 13px 16px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
            vertical-align: middle;
        }
        tbody tr { transition: background .15s; }
        tbody tr:hover { background: rgba(79,70,229,.02); }
        tbody tr:last-child td { border-bottom: none; }
        .link-primary {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color .2s;
        }
        .link-primary:hover { color: var(--primary-hover); text-decoration: underline; }
        .score-badge {
            display: inline-block;
            background: rgba(79,70,229,.08);
            color: var(--primary);
            font-weight: 700;
            font-size: .82rem;
            padding: 4px 12px;
            border-radius: 20px;
        }
        .td-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .td-actions form { display: inline; }

        /* ── Empty ── */
        .empty-state {
            text-align: center;
            padding: 56px 24px;
            color: var(--text-light);
        }
        .empty-state svg {
            width: 56px;
            height: 56px;
            margin-bottom: 12px;
            opacity: .35;
        }
        .empty-state p {
            font-size: .95rem;
            font-weight: 500;
        }

        /* ── Animations ── */
        @keyframes fadeIn { from { opacity:0; transform:translateY(-6px); } to { opacity:1; transform:translateY(0); } }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .container { padding: 20px 16px 48px; }
            .page-header { flex-direction: column; align-items: flex-start; }
            .filter-group { min-width: 100%; }
            .filter-actions { width: 100%; }
            .filter-actions .btn { flex: 1; justify-content: center; }
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
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">Dashboard</a>
            <a href="{{ route('admin.analysis') }}" class="nav-link">Analisis Data</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        {{-- ── Session Alert ── --}}
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        {{-- ── Header ── --}}
        <div class="page-header">
            <h1 class="page-title">Data Hasil Kuesioner</h1>
            <a href="{{ route('admin.export') }}" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Export CSV
            </a>
        </div>

        {{-- ── Filter ── --}}
        <div class="filter-card">
            <form action="{{ route('admin.dashboard') }}" method="GET" class="filter-form">
                <div class="filter-group">
                    <label class="filter-label">Cari Nama / Email</label>
                    <input type="text" name="search" class="filter-input" placeholder="Ketik nama atau email…" value="{{ request('search') }}">
                </div>
                <div class="filter-group" style="flex:.5;min-width:140px">
                    <label class="filter-label">Semester</label>
                    <select name="semester" class="filter-select">
                        <option value="">Semua</option>
                        @foreach($semester_list as $sem)
                            <option value="{{ $sem }}" {{ request('semester') == $sem ? 'selected' : '' }}>Semester {{ $sem }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-actions">
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        Cari
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">Reset</a>
                </div>
            </form>
        </div>

        {{-- ── Data Table ── --}}
        <div class="table-wrapper">
            @if($kuesioners->count())
                <table>
                    <thead>
                        <tr>
                            <th>Waktu Submit</th>
                            <th>Email Responden</th>
                            <th>Semester</th>
                            <th>Jenis Kelamin</th>
                            <th>Latar Pendidikan</th>
                            <th>Total Skor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kuesioners as $k)
                            @php
                                $total = 0;
                                foreach (['d1_1','d1_2','d1_3','d1_4','d1_5','d1_6',
                                          'd2_1','d2_2','d2_3','d2_4','d2_5',
                                          'd3_1','d3_2','d3_3','d3_4','d3_5','d3_6',
                                          'd4_1','d4_2','d4_3','d4_4','d4_5',
                                          'd5_1','d5_2','d5_3','d5_4','d5_5','d5_6',
                                          'd6_1','d6_2','d6_3','d6_4','d6_5'] as $f) {
                                    $total += (int) $k->$f;
                                }
                            @endphp
                            <tr>
                                <td style="white-space:nowrap">{{ $k->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.show', $k->id) }}" class="link-primary">{{ $k->user->email }}</a>
                                </td>
                                <td>{{ $k->semester }}</td>
                                <td>{{ $k->jenis_kelamin }}</td>
                                <td>{{ $k->latar_pendidikan }}</td>
                                <td><span class="score-badge">{{ $total }} / 165</span></td>
                                <td>
                                    <div class="td-actions">
                                        <a href="{{ route('admin.show', $k->id) }}" class="btn btn-primary" style="padding:6px 14px;font-size:.78rem">Detail</a>
                                        @if(Auth::user()->role === 'superadmin')
                                            <form action="{{ route('admin.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    <p>Belum ada data kuesioner yang masuk.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
