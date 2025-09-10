<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        Subject::create(['subject_name' => 'Matematika']);
        Subject::create(['subject_name' => 'Bahasa Indonesia']);
        Subject::create(['subject_name' => 'Pemrograman']);

    }
}
