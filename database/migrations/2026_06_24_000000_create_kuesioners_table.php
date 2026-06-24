<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kuesioners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();

            // Identitas Responden (8 field)
            $table->string('semester');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('latar_pendidikan');
            $table->enum('pernah_belajar_akuntansi', ['Ya', 'Tidak']);
            $table->enum('pernah_pakai_software', ['Ya', 'Tidak']);
            $table->json('aplikasi_digital')->nullable();
            $table->string('alasan_memilih_prodi');
            $table->string('rencana_karier');

            // D1: Motivasi Awal Memilih Prodi Akuntansi (6 item)
            for ($i = 1; $i <= 6; $i++) $table->integer("d1_$i");

            // D2: Pergeseran Pandangan tentang Profesi Akuntan (5 item)
            for ($i = 1; $i <= 5; $i++) $table->integer("d2_$i");

            // D3: Persepsi terhadap Disrupsi Digital dan Otomatisasi (6 item)
            for ($i = 1; $i <= 6; $i++) $table->integer("d3_$i");

            // D4: Penerimaan Teknologi dalam Pembelajaran Akuntansi (5 item)
            for ($i = 1; $i <= 5; $i++) $table->integer("d4_$i");

            // D5: Kesiapan Kompetensi Mahasiswa (6 item)
            for ($i = 1; $i <= 6; $i++) $table->integer("d5_$i");

            // D6: Pengaruh Latar Belakang Pendidikan (5 item)
            for ($i = 1; $i <= 5; $i++) $table->integer("d6_$i");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioners');
    }
};
