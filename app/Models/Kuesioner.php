<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    protected $table = 'kuesioners';

    protected $fillable = [
        'user_id',
        'semester',
        'jenis_kelamin',
        'latar_pendidikan',
        'pernah_belajar_akuntansi',
        'pernah_pakai_software',
        'aplikasi_digital',
        'alasan_memilih_prodi',
        'rencana_karier',
        // D1: Motivasi Awal (6 item)
        'd1_1', 'd1_2', 'd1_3', 'd1_4', 'd1_5', 'd1_6',
        // D2: Pergeseran Pandangan (5 item)
        'd2_1', 'd2_2', 'd2_3', 'd2_4', 'd2_5',
        // D3: Persepsi Disrupsi Digital (6 item)
        'd3_1', 'd3_2', 'd3_3', 'd3_4', 'd3_5', 'd3_6',
        // D4: Penerimaan Teknologi (5 item)
        'd4_1', 'd4_2', 'd4_3', 'd4_4', 'd4_5',
        // D5: Kesiapan Kompetensi (6 item)
        'd5_1', 'd5_2', 'd5_3', 'd5_4', 'd5_5', 'd5_6',
        // D6: Pengaruh Latar Belakang (5 item)
        'd6_1', 'd6_2', 'd6_3', 'd6_4', 'd6_5',
    ];

    protected $casts = [
        'aplikasi_digital' => 'array',
    ];

    protected $appends = ['score'];

    public function getScoreAttribute()
    {
        $total = 0;
        // D1 (6 items)
        for ($i = 1; $i <= 6; $i++) $total += $this->{"d1_$i"} ?? 0;
        // D2 (5 items)
        for ($i = 1; $i <= 5; $i++) $total += $this->{"d2_$i"} ?? 0;
        // D3 (6 items)
        for ($i = 1; $i <= 6; $i++) $total += $this->{"d3_$i"} ?? 0;
        // D4 (5 items)
        for ($i = 1; $i <= 5; $i++) $total += $this->{"d4_$i"} ?? 0;
        // D5 (6 items)
        for ($i = 1; $i <= 6; $i++) $total += $this->{"d5_$i"} ?? 0;
        // D6 (5 items)
        for ($i = 1; $i <= 5; $i++) $total += $this->{"d6_$i"} ?? 0;
        return $total;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
