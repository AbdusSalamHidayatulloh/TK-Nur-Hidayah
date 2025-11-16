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
            UserSeeder::class,
            FacilitySeeder::class,
            PhotoSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            EventSeeder::class,
        ]);
    }
}
