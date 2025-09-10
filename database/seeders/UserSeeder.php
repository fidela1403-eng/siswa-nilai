<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Utama',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Wali Kelas 1',
                'email' => 'walikelas@example.com',
                'password' => Hash::make('password'),
                'role' => 'wali_kelas',
            ],
            [
                'name' => 'Siswa Pertama',
                'email' => 'siswa@example.com',
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ],
            [
                'name' => 'Kepala Sekolah',
                'email' => 'kepsek@example.com',
                'password' => Hash::make('password'),
                'role' => 'kepala_sekolah',
            ],
        ]);
    }
}
