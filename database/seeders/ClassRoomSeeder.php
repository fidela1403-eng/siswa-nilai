<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassRoom;

class ClassRoomSeeder extends Seeder
{
    public function run()
    {
        ClassRoom::create(['class_name' => 'X RPL 1']);
        ClassRoom::create(['class_name' => 'X RPL 2']);
        ClassRoom::create(['class_name' => 'XI RPL 1']);
    }
}
