<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;

class GradeSeeder extends Seeder
{
    public function run()
    {
        // cari siswa berdasarkan nama
        $siswa1 = Student::where('name', 'Fidela Dama Eksani')->first();
        $siswa2 = Student::where('name', 'Budi Santoso')->first();

        // cari mapel pertama (misalnya Matematika)
        $mapel = Subject::first(); 

        if ($siswa1 && $mapel) {
            Grade::create([
                'student_id'  => $siswa1->id,
                'subject_id'  => $mapel->id,
                'tugas'       => 80,
                'uts'         => 85,
                'uas'         => 90,
                'nilai_akhir' => 85,
            ]);
        }

        if ($siswa2 && $mapel) {
            Grade::create([
                'student_id'  => $siswa2->id,
                'subject_id'  => $mapel->id,
                'tugas'       => 70,
                'uts'         => 75,
                'uas'         => 80,
                'nilai_akhir' => 75,
            ]);
        }
    }
}

