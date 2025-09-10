<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    public function run()
    {
        Grade::create([
            'student_id' => 1,
            'subject_id' => 1,
            'tugas' => 80,
            'uts' => 85,
            'uas' => 90,
            'nilai_akhir' => 85, // bisa dihitung manual atau otomatis
        ]);

        Grade::create([
            'student_id' => 1,
            'subject_id' => 2,
            'tugas' => 75,
            'uts' => 88,
            'uas' => 92,
            'nilai_akhir' => 85,
        ]);

        Grade::create([
            'student_id' => 2,
            'subject_id' => 1,
            'tugas' => 70,
            'uts' => 80,
            'uas' => 85,
            'nilai_akhir' => 79,
        ]);
    }
}
