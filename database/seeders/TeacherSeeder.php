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
            'position' => 'Guru Kelas A',
            'birthdate' => "29/11/2000",
            'image' => '/image/teacherImage/guru1.jpg'
        ]);

        $muhammadUser = User::where('email', 'Muhammad@nur.hidayah.com')->first();
        Teacher::create([
            'user_id' => $muhammadUser->id,
            'position' => 'Guru Kelas B',
            'birthdate' => "12/03/1998",
            'image' => '/image/teacherImage/guru2.jpg'
        ]);
        $joelUser = User::where('email', 'joel@nur.hidayah.com')->first();
        Teacher::create([
            'user_id' => $joelUser->id,
            'position' => 'Guru Kelas 2C',
            'birthdate' => "29/05/2001",
            'image' => '/image/teacherImage/guru3.jpg',
        ]);
    }
}
