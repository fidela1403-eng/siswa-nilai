<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClassRoomSeeder::class,
            UserSeeder::class,
            StudentSeeder::class,
            SubjectSeeder::class,
            GradeSeeder::class,
        ]);
    }
}
