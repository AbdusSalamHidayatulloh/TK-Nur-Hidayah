<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $annaUser = User::where('email', 'anna@nur.hidayah.com')->first();
        Teacher::create([
            'user_id' => $annaUser->id,
            'position' => 'Kindergarten Teacher',
            'age' => 28,
            'image' => '/image/guru1'
        ]);

        $muhammadUser = User::where('email', 'Muhammad@nur.hidayah.com')->first();
        Teacher::create([
            'user_id' => $muhammadUser->id,
            'position' => 'Preschool Teacher',
            'age' => 32,
            'image' => '/image/guru2'
        ]);
    }
}
