<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Kuesioner::with('user')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('semester', 'like', "%{$search}%")
                  ->orWhere('latar_pendidikan', 'like', "%{$search}%")
                  ->orWhere('alasan_memilih_prodi', 'like', "%{$search}%")
                  ->orWhereHas('user', function($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('semester')) {
            $query->where('semester', $request->semester);
        }

        $kuesioners = $query->get();
        $semester_list = Kuesioner::distinct()->whereNotNull('semester')->pluck('semester');

        return view('admin.dashboard', compact('kuesioners', 'semester_list'));
    }

    public function show($id)
    {
        $kuesioner = Kuesioner::with('user')->findOrFail($id);
        return view('admin.show', compact('kuesioner'));
    }

    public function export()
    {
        $kuesioners = Kuesioner::with('user')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="hasil_kuesioner_motivasi_akuntansi_' . date('Ymd_His') . '.csv"',
        ];

        $callback = function () use ($kuesioners) {
            $file = fopen('php://output', 'w');
            // BOM for Excel UTF-8 support
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // CSV Header
            fputcsv($file, [
                'ID', 'Email Akun', 'Nama',
                'Semester', 'Jenis Kelamin', 'Latar Pendidikan',
                'Pernah Belajar Akuntansi', 'Pernah Pakai Software',
                'Aplikasi Digital', 'Alasan Memilih Prodi', 'Rencana Karier',
                'D1.1', 'D1.2', 'D1.3', 'D1.4', 'D1.5', 'D1.6',
                'D2.1', 'D2.2', 'D2.3', 'D2.4', 'D2.5',
                'D3.1', 'D3.2', 'D3.3', 'D3.4', 'D3.5', 'D3.6',
                'D4.1', 'D4.2', 'D4.3', 'D4.4', 'D4.5',
                'D5.1', 'D5.2', 'D5.3', 'D5.4', 'D5.5', 'D5.6',
                'D6.1', 'D6.2', 'D6.3', 'D6.4', 'D6.5',
                'Total Skor', 'Tanggal Submit'
            ]);

            foreach ($kuesioners as $k) {
                $aplikasi = is_array($k->aplikasi_digital) 
                    ? implode('; ', $k->aplikasi_digital) 
                    : ($k->aplikasi_digital ?? '-');

                fputcsv($file, [
                    $k->id,
                    $k->user->email ?? '-',
                    $k->user->name ?? '-',
                    $k->semester,
                    $k->jenis_kelamin,
                    $k->latar_pendidikan,
                    $k->pernah_belajar_akuntansi,
                    $k->pernah_pakai_software,
                    $aplikasi,
                    $k->alasan_memilih_prodi,
                    $k->rencana_karier,
                    $k->d1_1, $k->d1_2, $k->d1_3, $k->d1_4, $k->d1_5, $k->d1_6,
                    $k->d2_1, $k->d2_2, $k->d2_3, $k->d2_4, $k->d2_5,
                    $k->d3_1, $k->d3_2, $k->d3_3, $k->d3_4, $k->d3_5, $k->d3_6,
                    $k->d4_1, $k->d4_2, $k->d4_3, $k->d4_4, $k->d4_5,
                    $k->d5_1, $k->d5_2, $k->d5_3, $k->d5_4, $k->d5_5, $k->d5_6,
                    $k->d6_1, $k->d6_2, $k->d6_3, $k->d6_4, $k->d6_5,
                    $k->score,
                    $k->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403, 'Anda tidak memiliki kewenangan untuk menghapus data.');
        }

        $kuesioner = Kuesioner::findOrFail($id);
        $kuesioner->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data kuesioner berhasil dihapus.');
    }

    public function analysis(Request $request)
    {
        $kuesioners = Kuesioner::with('user')->get();
        $totalRespondents = $kuesioners->count();

        // 1. Demographics
        $semesterCounts = ['Semester 2' => 0, 'Semester 4' => 0, 'Semester 6' => 0];
        $genderCounts = ['Laki-laki' => 0, 'Perempuan' => 0];
        $latarCounts = ['SMA IPA' => 0, 'SMA IPS' => 0, 'SMK Akuntansi' => 0, 'SMK Non-Akuntansi' => 0, 'MA' => 0];
        $belajarCounts = ['Ya' => 0, 'Tidak' => 0];
        $softwareCounts = ['Ya' => 0, 'Tidak' => 0];
        
        $appFrequencies = [
            'Microsoft Excel' => 0,
            'Accurate' => 0,
            'MYOB' => 0,
            'Zahir' => 0,
            'Aplikasi lain yang dikenalkan dosen' => 0,
            'Belum pernah' => 0,
        ];
        
        $alasanCounts = [
            'Minat pribadi' => 0,
            'Peluang kerja luas' => 0,
            'Profesi dianggap stabil' => 0,
            'Dorongan orang tua atau keluarga' => 0,
            'Sesuai latar belakang sekolah' => 0,
            'Belum memiliki alasan khusus' => 0,
        ];
        
        $karierCounts = [
            'Akuntan' => 0,
            'Auditor' => 0,
            'Konsultan pajak' => 0,
            'Staf keuangan' => 0,
            'Wirausaha' => 0,
            'Belum tahu' => 0,
        ];

        foreach ($kuesioners as $k) {
            if (isset($semesterCounts[$k->semester])) $semesterCounts[$k->semester]++;
            if (isset($genderCounts[$k->jenis_kelamin])) $genderCounts[$k->jenis_kelamin]++;
            if (isset($latarCounts[$k->latar_pendidikan])) $latarCounts[$k->latar_pendidikan]++;
            if (isset($belajarCounts[$k->pernah_belajar_akuntansi])) $belajarCounts[$k->pernah_belajar_akuntansi]++;
            if (isset($softwareCounts[$k->pernah_pakai_software])) $softwareCounts[$k->pernah_pakai_software]++;
            
            if (is_array($k->aplikasi_digital)) {
                foreach ($k->aplikasi_digital as $app) {
                    if (isset($appFrequencies[$app])) $appFrequencies[$app]++;
                }
            }
            
            if (isset($alasanCounts[$k->alasan_memilih_prodi])) $alasanCounts[$k->alasan_memilih_prodi]++;
            if (isset($karierCounts[$k->rencana_karier])) $karierCounts[$k->rencana_karier]++;
        }

        // Likert Questions List
        $likertFields = [];
        for ($i = 1; $i <= 6; $i++) $likertFields[] = "d1_$i";
        for ($i = 1; $i <= 5; $i++) $likertFields[] = "d2_$i";
        for ($i = 1; $i <= 6; $i++) $likertFields[] = "d3_$i";
        for ($i = 1; $i <= 5; $i++) $likertFields[] = "d4_$i";
        for ($i = 1; $i <= 6; $i++) $likertFields[] = "d5_$i";
        for ($i = 1; $i <= 5; $i++) $likertFields[] = "d6_$i";

        // 2. Cronbach's Alpha
        $cronbachAlpha = null;
        if ($totalRespondents > 1) {
            $totalScores = [];
            $itemResponses = [];
            foreach ($likertFields as $f) {
                $itemResponses[$f] = [];
            }
            foreach ($kuesioners as $k) {
                $total = 0;
                foreach ($likertFields as $f) {
                    $val = (int) $k->$f;
                    $total += $val;
                    $itemResponses[$f][] = $val;
                }
                $totalScores[] = $total;
            }
            $sumItemVariances = 0.0;
            foreach ($likertFields as $f) {
                $sumItemVariances += $this->variance($itemResponses[$f]);
            }
            $totalScoreVariance = $this->variance($totalScores);
            if ($totalScoreVariance > 0) {
                $K = count($likertFields);
                $cronbachAlpha = ($K / ($K - 1)) * (1 - ($sumItemVariances / $totalScoreVariance));
            }
        }

        // 3. Dimension-level stats
        $dimensions = [
            'D1' => ['title' => 'Motivasi memilih Akuntansi', 'fields' => ['d1_1','d1_2','d1_3','d1_4','d1_5','d1_6'], 'max' => 30],
            'D2' => ['title' => 'Pergeseran paradigma karier', 'fields' => ['d2_1','d2_2','d2_3','d2_4','d2_5'], 'max' => 25],
            'D3' => ['title' => 'Persepsi disrupsi digital', 'fields' => ['d3_1','d3_2','d3_3','d3_4','d3_5','d3_6'], 'max' => 30],
            'D4' => ['title' => 'Penerimaan teknologi', 'fields' => ['d4_1','d4_2','d4_3','d4_4','d4_5'], 'max' => 25],
            'D5' => ['title' => 'Kesiapan kompetensi', 'fields' => ['d5_1','d5_2','d5_3','d5_4','d5_5','d5_6'], 'max' => 30],
            'D6' => ['title' => 'Latar belakang pendidikan', 'fields' => ['d6_1','d6_2','d6_3','d6_4','d6_5'], 'max' => 25],
        ];

        $dimensionStats = [];
        foreach ($dimensions as $key => $dim) {
            $sums = [];
            $allScoresCount = 0;
            $allScoresSum = 0;
            foreach ($kuesioners as $k) {
                $sum = 0;
                foreach ($dim['fields'] as $f) {
                    $val = (int) $k->$f;
                    $sum += $val;
                    $allScoresSum += $val;
                    $allScoresCount++;
                }
                $sums[] = $sum;
            }

            $count = count($sums);
            $meanTotal = $count > 0 ? array_sum($sums) / $count : 0;
            $meanItem = $allScoresCount > 0 ? $allScoresSum / $allScoresCount : 0;
            $min = $count > 0 ? min($sums) : 0;
            $max = $count > 0 ? max($sums) : 0;
            $sd = $count > 1 ? sqrt($this->variance($sums)) : 0;

            // Interpretation
            $interpretation = 'Sedang';
            if ($meanItem >= 4.21) $interpretation = 'Sangat Tinggi';
            elseif ($meanItem >= 3.41) $interpretation = 'Tinggi';
            elseif ($meanItem >= 2.61) $interpretation = 'Sedang';
            elseif ($meanItem >= 1.81) $interpretation = 'Rendah';
            else $interpretation = 'Sangat Rendah';

            $dimensionStats[$key] = [
                'title' => $dim['title'],
                'mean_total' => $meanTotal,
                'mean_item' => $meanItem,
                'min' => $min,
                'max' => $max,
                'sd' => $sd,
                'interpretation' => $interpretation,
            ];
        }

        // 4. Item-level stats
        $itemStats = [];
        foreach ($likertFields as $f) {
            $freq = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
            $sum = 0;
            foreach ($kuesioners as $k) {
                $val = (int) $k->$f;
                $freq[$val]++;
                $sum += $val;
            }
            $mean = $totalRespondents > 0 ? $sum / $totalRespondents : 0;
            $itemStats[$f] = [
                'mean' => $mean,
                'freq' => $freq,
            ];
        }

        // 5. Cross Tabulation by Semester
        $semesters = ['Semester 2', 'Semester 4', 'Semester 6'];
        $crossSemester = [];
        foreach ($dimensions as $key => $dim) {
            $crossSemester[$key] = [
                'title' => $dim['title'],
                'Semester 2' => 0.0,
                'Semester 4' => 0.0,
                'Semester 6' => 0.0,
            ];
            foreach ($semesters as $sem) {
                $semKuesioners = $kuesioners->where('semester', $sem);
                $totalSum = 0;
                $totalCount = 0;
                foreach ($semKuesioners as $k) {
                    foreach ($dim['fields'] as $f) {
                        $totalSum += (int) $k->$f;
                        $totalCount++;
                    }
                }
                $crossSemester[$key][$sem] = $totalCount > 0 ? $totalSum / $totalCount : 0.0;
            }
        }

        // 6. Cross Tabulation by Latar Belakang (Pernah Belajar Akuntansi)
        $groups = ['Ya', 'Tidak'];
        $crossBelajar = [];
        foreach ($dimensions as $key => $dim) {
            $crossBelajar[$key] = [
                'title' => $dim['title'],
                'Ya' => 0.0,
                'Tidak' => 0.0,
            ];
            foreach ($groups as $g) {
                $groupKuesioners = $kuesioners->where('pernah_belajar_akuntansi', $g);
                $totalSum = 0;
                $totalCount = 0;
                foreach ($groupKuesioners as $k) {
                    foreach ($dim['fields'] as $f) {
                        $totalSum += (int) $k->$f;
                        $totalCount++;
                    }
                }
                $crossBelajar[$key][$g] = $totalCount > 0 ? $totalSum / $totalCount : 0.0;
            }
        }

        return view('admin.analysis', compact(
            'totalRespondents',
            'semesterCounts',
            'genderCounts',
            'latarCounts',
            'belajarCounts',
            'softwareCounts',
            'appFrequencies',
            'alasanCounts',
            'karierCounts',
            'cronbachAlpha',
            'dimensionStats',
            'itemStats',
            'crossSemester',
            'crossBelajar'
        ));
    }

    private function variance(array $values)
    {
        $n = count($values);
        if ($n === 0) return 0.0;
        $mean = array_sum($values) / $n;
        $sumSqDiff = 0.0;
        foreach ($values as $val) {
            $sumSqDiff += pow($val - $mean, 2);
        }
        return $sumSqDiff / $n;
    }
}
