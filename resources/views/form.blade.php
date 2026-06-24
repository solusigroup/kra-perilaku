<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuesioner Motivasi Akuntansi</title>
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
            --danger: #ef4444;
            --danger-bg: #fef2f2;
            --danger-border: #fecaca;
            --success: #10b981;
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
            line-height: 1.6;
            min-height: 100vh;
        }

        /* ── Navbar ── */
        .navbar {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
            padding: 0 1.5rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0,0,0,.04);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -.02em;
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .navbar-links a,
        .navbar-links button {
            font-family: 'Outfit', sans-serif;
            font-size: .875rem;
            font-weight: 600;
            text-decoration: none;
            padding: .45rem 1rem;
            border-radius: 8px;
            transition: all .2s ease;
            cursor: pointer;
        }

        .navbar-links a {
            color: var(--text-light);
        }

        .navbar-links a:hover {
            color: var(--primary);
            background: rgba(79,70,229,.06);
        }

        .btn-logout {
            background: none;
            border: 1px solid var(--border);
            color: var(--text-light);
        }

        .btn-logout:hover {
            border-color: var(--danger);
            color: var(--danger);
            background: var(--danger-bg);
        }

        /* ── Layout ── */
        .container {
            max-width: 820px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }

        /* ── Page header ── */
        .page-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -.03em;
            color: var(--text);
            margin-bottom: .35rem;
        }

        .page-header p {
            color: var(--text-light);
            font-size: .95rem;
            font-weight: 300;
        }

        /* ── Error box ── */
        .error-box {
            background: var(--danger-bg);
            border: 1px solid var(--danger-border);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            animation: fadeIn .3s ease;
        }

        .error-box h4 {
            font-size: .9rem;
            font-weight: 600;
            color: var(--danger);
            margin-bottom: .5rem;
        }

        .error-box ul {
            list-style: none;
            padding: 0;
        }

        .error-box li {
            font-size: .82rem;
            color: var(--danger);
            padding: .15rem 0;
            padding-left: 1rem;
            position: relative;
        }

        .error-box li::before {
            content: '•';
            position: absolute;
            left: 0;
        }

        /* ── Section titles ── */
        .section-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1.25rem;
            padding-bottom: .6rem;
            border-bottom: 2px solid var(--primary);
            letter-spacing: -.02em;
        }

        .section-subtitle {
            font-size: .95rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: .75rem;
            margin-top: 1.75rem;
            padding-left: .25rem;
        }

        /* ── Identity grid ── */
        .identity-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .identity-grid .field-full {
            grid-column: 1 / -1;
        }

        @media (max-width: 600px) {
            .identity-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ── Field group ── */
        .field-group {
            display: flex;
            flex-direction: column;
            gap: .35rem;
        }

        .field-group label {
            font-size: .85rem;
            font-weight: 600;
            color: var(--text);
        }

        .field-group label .req {
            color: var(--danger);
            margin-left: 2px;
        }

        .field-group select {
            font-family: 'Outfit', sans-serif;
            font-size: .88rem;
            padding: .6rem .85rem;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--card-bg);
            color: var(--text);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1.5L6 6.5L11 1.5' stroke='%2364748b' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right .85rem center;
            transition: border-color .2s, box-shadow .2s;
            cursor: pointer;
        }

        .field-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,.12);
        }

        /* ── Checkbox group ── */
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: .5rem;
            margin-top: .25rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: .55rem;
            cursor: pointer;
        }

        .checkbox-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
            flex-shrink: 0;
        }

        .checkbox-item span {
            font-size: .88rem;
            color: var(--text);
        }

        /* ── Section divider ── */
        .section-divider {
            margin: 2.5rem 0 1.5rem;
            border: none;
            border-top: 1px solid var(--border);
        }

        /* ── Likert scale info ── */
        .scale-info {
            background: linear-gradient(135deg, rgba(79,70,229,.06), rgba(79,70,229,.02));
            border: 1px solid rgba(79,70,229,.15);
            border-radius: 12px;
            padding: .85rem 1.15rem;
            font-size: .85rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        /* ── Dimension group ── */
        .dimension-group {
            margin-bottom: 2rem;
        }

        .dimension-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 1rem;
            padding: .7rem 1rem;
            background: linear-gradient(135deg, rgba(79,70,229,.07), rgba(79,70,229,.02));
            border-left: 3px solid var(--primary);
            border-radius: 0 10px 10px 0;
        }

        /* ── Question card ── */
        .q-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-bottom: .75rem;
            transition: border-color .2s, box-shadow .2s;
        }

        .q-card:hover {
            border-color: rgba(79,70,229,.25);
            box-shadow: 0 2px 8px rgba(79,70,229,.06);
        }

        .q-text {
            font-size: .88rem;
            font-weight: 400;
            color: var(--text);
            margin-bottom: .75rem;
            line-height: 1.55;
        }

        .q-options {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            flex-wrap: wrap;
        }

        .radio-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .3rem;
            padding: .4rem .75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            cursor: pointer;
            font-size: .8rem;
            font-weight: 400;
            color: var(--text-light);
            transition: all .2s ease;
            user-select: none;
            min-width: 44px;
            text-align: center;
        }

        .radio-label:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: rgba(79,70,229,.04);
        }

        .radio-label input[type="radio"] {
            display: none;
        }

        .radio-label input[type="radio"]:checked + .radio-text {
            color: #fff;
        }

        .radio-label:has(input:checked) {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
            box-shadow: 0 2px 6px rgba(79,70,229,.25);
        }

        .radio-text .full {
            display: inline;
        }

        .radio-text .short {
            display: none;
        }

        @media (max-width: 600px) {
            .radio-text .full {
                display: none;
            }
            .radio-text .short {
                display: inline;
            }
            .radio-label {
                min-width: 40px;
                padding: .4rem .55rem;
            }
        }

        /* ── Submit ── */
        .submit-wrap {
            text-align: center;
            margin-top: 2.5rem;
        }

        .btn-submit {
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            padding: .85rem 2.5rem;
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all .25s ease;
            box-shadow: 0 4px 14px rgba(79,70,229,.3);
            letter-spacing: -.01em;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
            box-shadow: 0 6px 20px rgba(79,70,229,.4);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* ── Animations ── */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── Footer ── */
        .form-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            font-size: .8rem;
            color: var(--text-light);
            font-weight: 300;
        }
    </style>
</head>
<body>

    {{-- ── Navbar ── --}}
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="navbar-brand">Kuesioner Motivasi Akuntansi</a>
        <div class="navbar-links">
            @if(auth()->user() && auth()->user()->role === 'superadmin')
                <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">

        {{-- ── Page Header ── --}}
        <div class="page-header">
            <h1>Kuesioner Penelitian</h1>
            <p>Silakan isi seluruh pertanyaan berikut dengan jujur sesuai pengalaman Anda.</p>
        </div>

        {{-- ── Validation Errors ── --}}
        @if($errors->any())
            <div class="error-box">
                <h4>⚠️ Terdapat kesalahan pada pengisian:</h4>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kuesioner.store') }}" method="POST">
            @csrf

            {{-- ══════════════════════════════════════════════
                 SECTION I — Identitas Responden
            ══════════════════════════════════════════════ --}}
            <h2 class="section-title">Bagian I — Identitas Responden</h2>

            <div class="identity-grid">

                {{-- 1. Semester --}}
                <div class="field-group">
                    <label>Semester saat ini <span class="req">*</span></label>
                    <select name="semester" required>
                        <option value="">Pilih</option>
                        @foreach(['Semester 2','Semester 4','Semester 6'] as $opt)
                            <option value="{{ $opt }}" {{ old('semester') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- 2. Jenis Kelamin --}}
                <div class="field-group">
                    <label>Jenis Kelamin <span class="req">*</span></label>
                    <select name="jenis_kelamin" required>
                        <option value="">Pilih</option>
                        @foreach(['Laki-laki','Perempuan'] as $opt)
                            <option value="{{ $opt }}" {{ old('jenis_kelamin') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- 3. Latar Pendidikan --}}
                <div class="field-group field-full">
                    <label>Latar belakang pendidikan sebelum kuliah <span class="req">*</span></label>
                    <select name="latar_pendidikan" required>
                        <option value="">Pilih</option>
                        @foreach(['SMA IPA','SMA IPS','SMK Akuntansi','SMK Non-Akuntansi','MA'] as $opt)
                            <option value="{{ $opt }}" {{ old('latar_pendidikan') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- 4. Pernah Belajar Akuntansi --}}
                <div class="field-group">
                    <label>Apakah Anda pernah belajar akuntansi sebelum masuk kuliah? <span class="req">*</span></label>
                    <select name="pernah_belajar_akuntansi" required>
                        <option value="">Pilih</option>
                        @foreach(['Ya','Tidak'] as $opt)
                            <option value="{{ $opt }}" {{ old('pernah_belajar_akuntansi') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- 5. Pernah Pakai Software --}}
                <div class="field-group">
                    <label>Apakah Anda pernah menggunakan aplikasi atau software akuntansi? <span class="req">*</span></label>
                    <select name="pernah_pakai_software" required>
                        <option value="">Pilih</option>
                        @foreach(['Ya','Tidak'] as $opt)
                            <option value="{{ $opt }}" {{ old('pernah_pakai_software') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- 6. Aplikasi Digital (Checkbox) --}}
                <div class="field-group field-full">
                    <label>Aplikasi digital yang pernah Anda gunakan dalam pembelajaran akuntansi <span class="req">*</span></label>
                    <div class="checkbox-group">
                        @php
                            $appOptions = [
                                'Microsoft Excel',
                                'Accurate',
                                'MYOB',
                                'Zahir',
                                'Aplikasi lain yang dikenalkan dosen',
                                'Belum pernah',
                            ];
                        @endphp
                        @foreach($appOptions as $app)
                            <label class="checkbox-item">
                                <input type="checkbox" name="aplikasi_digital[]" value="{{ $app }}"
                                    @if(is_array(old('aplikasi_digital')) && in_array($app, old('aplikasi_digital'))) checked @endif>
                                <span>{{ $app }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- 7. Alasan Memilih Prodi --}}
                <div class="field-group field-full">
                    <label>Alasan utama Anda memilih Prodi Akuntansi <span class="req">*</span></label>
                    <select name="alasan_memilih_prodi" required>
                        <option value="">Pilih</option>
                        @foreach([
                            'Minat pribadi',
                            'Peluang kerja luas',
                            'Profesi dianggap stabil',
                            'Dorongan orang tua atau keluarga',
                            'Sesuai latar belakang sekolah',
                            'Belum memiliki alasan khusus'
                        ] as $opt)
                            <option value="{{ $opt }}" {{ old('alasan_memilih_prodi') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- 8. Rencana Karier --}}
                <div class="field-group field-full">
                    <label>Rencana karier setelah lulus <span class="req">*</span></label>
                    <select name="rencana_karier" required>
                        <option value="">Pilih</option>
                        @foreach([
                            'Akuntan',
                            'Auditor',
                            'Konsultan pajak',
                            'Staf keuangan',
                            'Wirausaha',
                            'Belum tahu'
                        ] as $opt)
                            <option value="{{ $opt }}" {{ old('rencana_karier') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>

            </div>{{-- /identity-grid --}}

            <hr class="section-divider">

            {{-- ══════════════════════════════════════════════
                 SECTION II — Kuesioner Inti (Likert)
            ══════════════════════════════════════════════ --}}
            <h2 class="section-title">Bagian II — Kuesioner Inti</h2>

            <div class="scale-info">
                Skala: 1 (Sangat Tidak Setuju) &nbsp;s.d&nbsp; 5 (Sangat Setuju)
            </div>

            @php
                $instrumen = [
                    [
                        'label' => '1. Motivasi Awal Memilih Prodi Akuntansi',
                        'prefix' => 'd1',
                        'questions' => [
                            'Saya memilih Prodi Akuntansi karena memiliki minat pada bidang keuangan dan bisnis.',
                            'Saya memilih Prodi Akuntansi karena peluang kerjanya luas.',
                            'Saya memilih Prodi Akuntansi karena profesinya dianggap stabil.',
                            'Saya memilih Prodi Akuntansi karena ingin bekerja di bidang akuntansi, audit, pajak, atau keuangan.',
                            'Saya memilih Prodi Akuntansi karena sesuai dengan kemampuan akademik saya.',
                            'Dorongan keluarga, guru, atau teman memengaruhi keputusan saya memilih Prodi Akuntansi.',
                        ]
                    ],
                    [
                        'label' => '2. Pergeseran Pandangan tentang Profesi Akuntan',
                        'prefix' => 'd2',
                        'questions' => [
                            'Pada awal kuliah, saya melihat pekerjaan akuntan lebih banyak berkaitan dengan pencatatan dan administrasi keuangan.',
                            'Saat ini saya memahami bahwa akuntan juga perlu memiliki kemampuan analisis dan pengambilan keputusan.',
                            'Pandangan saya tentang profesi akuntan berubah setelah mengikuti perkuliahan.',
                            'Semakin tinggi semester, pemahaman saya tentang karier akuntansi semakin realistis.',
                            'Saya mulai melihat akuntansi sebagai bidang yang berkaitan erat dengan teknologi digital.',
                        ]
                    ],
                    [
                        'label' => '3. Persepsi terhadap Disrupsi Digital dan Otomatisasi',
                        'prefix' => 'd3',
                        'questions' => [
                            'AI dan otomatisasi dapat menggantikan pekerjaan akuntansi yang bersifat rutin.',
                            'Perkembangan teknologi membuat profesi akuntan menjadi lebih menantang.',
                            'Saya khawatir sebagian pekerjaan akuntansi akan berkurang karena otomatisasi.',
                            'Teknologi digital tidak akan menghapus profesi akuntan sepenuhnya.',
                            'Teknologi digital membuka peluang baru bagi lulusan akuntansi.',
                            'Mahasiswa akuntansi perlu memahami AI, cloud accounting, dan analisis data.',
                        ]
                    ],
                    [
                        'label' => '4. Penerimaan Teknologi dalam Pembelajaran Akuntansi',
                        'prefix' => 'd4',
                        'questions' => [
                            'Aplikasi akuntansi digital membantu pekerjaan akuntansi menjadi lebih efisien.',
                            'Saya merasa teknologi akuntansi digital mudah dipelajari jika ada bimbingan.',
                            'Penguasaan teknologi digital dapat meningkatkan peluang kerja lulusan akuntansi.',
                            'Saya tertarik mempelajari aplikasi akuntansi digital lebih dalam.',
                            'Saya merasa pembelajaran akuntansi perlu lebih banyak menggunakan teknologi digital.',
                        ]
                    ],
                    [
                        'label' => '5. Kesiapan Kompetensi Mahasiswa',
                        'prefix' => 'd5',
                        'questions' => [
                            'Saya memiliki pemahaman dasar akuntansi yang cukup.',
                            'Saya memiliki kemampuan digital yang cukup untuk mendukung pembelajaran akuntansi.',
                            'Saya mampu menyesuaikan diri dengan pembelajaran akuntansi berbasis teknologi.',
                            'Saya perlu meningkatkan kemampuan analisis data.',
                            'Saya perlu meningkatkan kemampuan berpikir kritis dan komunikasi.',
                            'Saya siap mengikuti pelatihan atau sertifikasi terkait akuntansi digital.',
                        ]
                    ],
                    [
                        'label' => '6. Pengaruh Latar Belakang Pendidikan',
                        'prefix' => 'd6',
                        'questions' => [
                            'Latar belakang pendidikan saya membantu saya memahami materi akuntansi pada awal kuliah.',
                            'Mahasiswa yang pernah belajar akuntansi sebelum kuliah lebih mudah mengikuti mata kuliah akuntansi dasar.',
                            'Perbedaan latar belakang sekolah memengaruhi kecepatan mahasiswa dalam memahami akuntansi.',
                            'Perkuliahan membantu mengurangi kesenjangan pemahaman antara mahasiswa dari latar belakang berbeda.',
                            'Dosen dan kurikulum membantu mahasiswa lintas jurusan untuk beradaptasi dengan pembelajaran akuntansi.',
                        ]
                    ],
                ];

                $scaleLabels = [
                    1 => 'STS',
                    2 => 'TS',
                    3 => 'N',
                    4 => 'S',
                    5 => 'SS',
                ];
            @endphp

            @foreach($instrumen as $dimensi)
                <div class="dimension-group">
                    <div class="dimension-title">{{ $dimensi['label'] }}</div>

                    @foreach($dimensi['questions'] as $qIndex => $question)
                        @php
                            $name = $dimensi['prefix'] . '_' . ($qIndex + 1);
                        @endphp
                        <div class="q-card">
                            <div class="q-text">{{ $question }}</div>
                            <div class="q-options">
                                @for($i = 1; $i <= 5; $i++)
                                    <label class="radio-label">
                                        <input type="radio" name="{{ $name }}" value="{{ $i }}" required {{ old($name) == $i ? 'checked' : '' }}>
                                        <span class="radio-text">
                                            <span class="full">{{ $scaleLabels[$i] }} ({{ $i }})</span>
                                            <span class="short">{{ $i }}</span>
                                        </span>
                                    </label>
                                @endfor
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            {{-- ── Submit ── --}}
            <div class="submit-wrap">
                <button type="submit" class="btn-submit">Simpan &amp; Kirim Kuesioner</button>
            </div>

        </form>

        <div class="form-footer">
            &copy; {{ date('Y') }} Kuesioner Motivasi Akuntansi — Terima kasih atas partisipasi Anda.
        </div>

    </div>{{-- /container --}}

</body>
</html>
