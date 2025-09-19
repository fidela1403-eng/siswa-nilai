<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Wali Kelas 1',
            'email' => 'walikelas@example.com',
            'password' => Hash::make('password'),
            'role' => 'wali_kelas',
        ]);

         User::create([
            'name' => 'Wali Kelas 2',
            'email' => 'walikelas2@example.com',
            'password' => Hash::make('password'),
            'role' => 'wali_kelas',
         ]);

        User::create([
            'name' => 'Fidela',
            'email' => 'fidela@example.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        User::create([
            'name' => 'Aisah',
            'email' => 'ais@example.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        User::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@example.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_sekolah',
        ]);
    }
}
