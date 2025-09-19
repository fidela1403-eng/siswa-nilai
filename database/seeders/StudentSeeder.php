<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $fidela = User::where('email', 'fidela@example.com')->first();
        $ais    = User::where('email', 'ais@example.com')->first();

        if ($fidela) {
            Student::create([
                'name'          => 'Fidela Dama Eksani',
                'class_room_id' => 1,
                'id_user'       => $fidela->id_user,
            ]);
        }

        if ($ais) {
            Student::create([
                'name'          => 'Aisah',
                'class_room_id' => 1,
                'id_user'       => $ais->id_user,
            ]);
        }
    }
}
