<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'name' => 'Fidela Dama Eksani',
            'class_room_id' => 1
        ]);

        Student::create([
            'name' => 'Budi Santoso',
            'class_room_id' => 2
        ]);
    }
}
