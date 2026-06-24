<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create superadmin
        User::create([
            'name' => 'Admin Kurniawan',
            'email' => 'kurniawan.se@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'superadmin',
            'is_password_set' => true,
            'email_verified_at' => now(),
        ]);
    }
}
