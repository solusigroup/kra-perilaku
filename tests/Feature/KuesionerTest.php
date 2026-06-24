<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Kuesioner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KuesionerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test public pages.
     */
    public function test_public_pages_and_guest_access(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/login');
        $response->assertStatus(200);

        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    /**
     * Test respondent registration.
     */
    public function test_respondent_registration(): void
    {
        $response = $this->post('/register', [
            'name' => 'Budi Santoso',
            'email' => 'budi@ubs.ac.id',
        ]);

        $response->assertRedirect(route('kuesioner.create'));
        $this->assertDatabaseHas('users', [
            'name' => 'Budi Santoso',
            'email' => 'budi@ubs.ac.id',
            'role' => 'respondent',
        ]);
        $this->assertTrue(auth()->check());
    }

    /**
     * Test respondent login.
     */
    public function test_respondent_login_by_email(): void
    {
        $user = User::create([
            'name' => 'Ani Wijaya',
            'email' => 'ani@ubs.ac.id',
            'role' => 'respondent',
        ]);

        $response = $this->post('/login', [
            'email' => 'ani@ubs.ac.id',
        ]);

        $response->assertRedirect(route('kuesioner.create'));
        $this->assertTrue(auth()->check());
        $this->assertEquals($user->id, auth()->id());
    }

    /**
     * Test questionnaire submission.
     */
    public function test_kuesioner_submission(): void
    {
        $user = User::create([
            'name' => 'Candra',
            'email' => 'candra@ubs.ac.id',
            'role' => 'respondent',
        ]);

        $this->actingAs($user);

        $payload = [
            'semester' => 'Semester 4',
            'jenis_kelamin' => 'Laki-laki',
            'latar_pendidikan' => 'SMK Akuntansi',
            'pernah_belajar_akuntansi' => 'Ya',
            'pernah_pakai_software' => 'Ya',
            'aplikasi_digital' => ['Microsoft Excel', 'MYOB'],
            'alasan_memilih_prodi' => 'Minat pribadi',
            'rencana_karier' => 'Auditor',
        ];

        // 33 Likert questions
        for ($i = 1; $i <= 6; $i++) $payload["d1_$i"] = 4;
        for ($i = 1; $i <= 5; $i++) $payload["d2_$i"] = 3;
        for ($i = 1; $i <= 6; $i++) $payload["d3_$i"] = 5;
        for ($i = 1; $i <= 5; $i++) $payload["d4_$i"] = 4;
        for ($i = 1; $i <= 6; $i++) $payload["d5_$i"] = 4;
        for ($i = 1; $i <= 5; $i++) $payload["d6_$i"] = 3;

        $response = $this->post('/kuesioner', $payload);

        $response->assertRedirect(route('kuesioner.thanks'));
        $this->assertDatabaseHas('kuesioners', [
            'user_id' => $user->id,
            'semester' => 'Semester 4',
            'jenis_kelamin' => 'Laki-laki',
            'latar_pendidikan' => 'SMK Akuntansi',
        ]);

        // Verify JSON encoding of aplikasi_digital
        $kuesioner = Kuesioner::where('user_id', $user->id)->first();
        $this->assertContains('Microsoft Excel', $kuesioner->aplikasi_digital);
        $this->assertContains('MYOB', $kuesioner->aplikasi_digital);

        // Cannot submit twice
        $responseDouble = $this->post('/kuesioner', $payload);
        $responseDouble->assertRedirect(route('kuesioner.thanks'));
        $responseDouble->assertSessionHas('error');
    }

    /**
     * Test admin restrictions.
     */
    public function test_admin_dashboard_restrictions(): void
    {
        $user = User::create([
            'name' => 'Budi',
            'email' => 'budi@ubs.ac.id',
            'role' => 'respondent',
        ]);

        $this->actingAs($user);

        // Try accessing admin dashboard
        $response = $this->get('/admin');
        $response->assertStatus(403);
    }

    /**
     * Test admin features.
     */
    public function test_admin_features(): void
    {
        $admin = User::create([
            'name' => 'Admin Kurniawan',
            'email' => 'kurniawan.se@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'superadmin',
        ]);

        $respondent = User::create([
            'name' => 'Dina',
            'email' => 'dina@ubs.ac.id',
            'role' => 'respondent',
        ]);

        $respondent2 = User::create([
            'name' => 'Eko',
            'email' => 'eko@ubs.ac.id',
            'role' => 'respondent',
        ]);

        // Create questionnaire record 1
        $kuesioner = new Kuesioner();
        $kuesioner->user_id = $respondent->id;
        $kuesioner->semester = 'Semester 2';
        $kuesioner->jenis_kelamin = 'Perempuan';
        $kuesioner->latar_pendidikan = 'SMA IPA';
        $kuesioner->pernah_belajar_akuntansi = 'Tidak';
        $kuesioner->pernah_pakai_software = 'Tidak';
        $kuesioner->aplikasi_digital = ['Belum pernah'];
        $kuesioner->alasan_memilih_prodi = 'Peluang kerja luas';
        $kuesioner->rencana_karier = 'Akuntan';
        for ($i = 1; $i <= 6; $i++) $kuesioner["d1_$i"] = 4;
        for ($i = 1; $i <= 5; $i++) $kuesioner["d2_$i"] = 4;
        for ($i = 1; $i <= 6; $i++) $kuesioner["d3_$i"] = 4;
        for ($i = 1; $i <= 5; $i++) $kuesioner["d4_$i"] = 4;
        for ($i = 1; $i <= 6; $i++) $kuesioner["d5_$i"] = 4;
        for ($i = 1; $i <= 5; $i++) $kuesioner["d6_$i"] = 4;
        $kuesioner->save();

        // Create questionnaire record 2
        $kuesioner2 = new Kuesioner();
        $kuesioner2->user_id = $respondent2->id;
        $kuesioner2->semester = 'Semester 4';
        $kuesioner2->jenis_kelamin = 'Laki-laki';
        $kuesioner2->latar_pendidikan = 'SMK Akuntansi';
        $kuesioner2->pernah_belajar_akuntansi = 'Ya';
        $kuesioner2->pernah_pakai_software = 'Ya';
        $kuesioner2->aplikasi_digital = ['Microsoft Excel', 'MYOB'];
        $kuesioner2->alasan_memilih_prodi = 'Minat pribadi';
        $kuesioner2->rencana_karier = 'Auditor';
        for ($i = 1; $i <= 6; $i++) $kuesioner2["d1_$i"] = 5;
        for ($i = 1; $i <= 5; $i++) $kuesioner2["d2_$i"] = 3;
        for ($i = 1; $i <= 6; $i++) $kuesioner2["d3_$i"] = 5;
        for ($i = 1; $i <= 5; $i++) $kuesioner2["d4_$i"] = 4;
        for ($i = 1; $i <= 6; $i++) $kuesioner2["d5_$i"] = 3;
        for ($i = 1; $i <= 5; $i++) $kuesioner2["d6_$i"] = 2;
        $kuesioner2->save();

        $this->actingAs($admin);

        // Access dashboard
        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('dina@ubs.ac.id');
        $response->assertSee('eko@ubs.ac.id');
        $response->assertSee('Semester 2');

        // Access detail
        $response = $this->get("/admin/show/{$kuesioner->id}");
        $response->assertStatus(200);
        $response->assertSee('Dina');

        // Access Analysis
        $response = $this->get('/admin/analysis');
        $response->assertStatus(200);
        $response->assertSee('Analisis Data');
        $response->assertSee('Reliabilitas Instrumen');
        $response->assertSee('Semester Responden');

        // Access CSV Export
        $response = $this->get('/admin/export');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');

        // Delete records
        $response = $this->delete("/admin/destroy/{$kuesioner->id}");
        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseMissing('kuesioners', ['id' => $kuesioner->id]);

        $response2 = $this->delete("/admin/destroy/{$kuesioner2->id}");
        $response2->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseMissing('kuesioners', ['id' => $kuesioner2->id]);
    }
}
