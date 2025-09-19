<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\HomeroomTeacher;

class HomeroomTeacherSeeder extends Seeder
{
    public function run(): void
    {
        // cari user wali_kelas sesuai data UserSeeder
        $waliKelas = User::where('email', 'walikelas@example.com')->first();

        if (! $waliKelas) {
            $this->command->error(
                '❌ User dengan role wali_kelas belum ada. Jalankan: php artisan db:seed --class=UserSeeder'
            );
            return;
        }

        // buat data homeroom_teachers dengan kolom nama baru
        HomeroomTeacher::create([
            'classroom_id' => 1,                 // pastikan id=1 ada di tabel class_rooms
            'id_user'     => $waliKelas->id_user, // sesuai PK users
            'nama'        => $waliKelas->name,    // ambil nama user sebagai nama wali kelas
        ]);

        $this->command->info('✅ Data wali_kelas berhasil dimasukkan ke homeroom_teachers.');
    }
}
