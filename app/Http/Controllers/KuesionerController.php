<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource (respondent's own results).
     */
    public function index()
    {
        $kuesioners = Kuesioner::where('user_id', auth()->id())->latest()->get();
        return view('kuesioner', compact('kuesioners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Kuesioner::where('user_id', auth()->id())->exists()) {
            return redirect()->route('kuesioner.thanks')->with('info', 'Anda sudah mengisi kuesioner.');
        }
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Kuesioner::where('user_id', auth()->id())->exists()) {
            return redirect()->route('kuesioner.thanks')->with('error', 'Anda sudah mengisi kuesioner.');
        }

        $rules = [
            'semester' => 'required|in:Semester 2,Semester 4,Semester 6',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'latar_pendidikan' => 'required|in:SMA IPA,SMA IPS,SMK Akuntansi,SMK Non-Akuntansi,MA',
            'pernah_belajar_akuntansi' => 'required|in:Ya,Tidak',
            'pernah_pakai_software' => 'required|in:Ya,Tidak',
            'aplikasi_digital' => 'required|array|min:1',
            'aplikasi_digital.*' => 'in:Microsoft Excel,Accurate,MYOB,Zahir,Aplikasi lain yang dikenalkan dosen,Belum pernah',
            'alasan_memilih_prodi' => 'required|in:Minat pribadi,Peluang kerja luas,Profesi dianggap stabil,Dorongan orang tua atau keluarga,Sesuai latar belakang sekolah,Belum memiliki alasan khusus',
            'rencana_karier' => 'required|in:Akuntan,Auditor,Konsultan pajak,Staf keuangan,Wirausaha,Belum tahu',
        ];

        // D1: Motivasi Awal (6 items)
        for ($i = 1; $i <= 6; $i++) {
            $rules["d1_$i"] = 'required|integer|between:1,5';
        }
        // D2: Pergeseran Pandangan (5 items)
        for ($i = 1; $i <= 5; $i++) {
            $rules["d2_$i"] = 'required|integer|between:1,5';
        }
        // D3: Persepsi Disrupsi Digital (6 items)
        for ($i = 1; $i <= 6; $i++) {
            $rules["d3_$i"] = 'required|integer|between:1,5';
        }
        // D4: Penerimaan Teknologi (5 items)
        for ($i = 1; $i <= 5; $i++) {
            $rules["d4_$i"] = 'required|integer|between:1,5';
        }
        // D5: Kesiapan Kompetensi (6 items)
        for ($i = 1; $i <= 6; $i++) {
            $rules["d5_$i"] = 'required|integer|between:1,5';
        }
        // D6: Pengaruh Latar Belakang (5 items)
        for ($i = 1; $i <= 5; $i++) {
            $rules["d6_$i"] = 'required|integer|between:1,5';
        }

        $validated = $request->validate($rules);
        $validated['user_id'] = auth()->id();

        Kuesioner::create($validated);

        return redirect()->route('kuesioner.thanks')->with('success', 'Kuesioner berhasil disimpan.');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
