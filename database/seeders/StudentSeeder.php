<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $defaultImage = 'image/teacherImage/guru1.jpg';

        $students = [
            ['image' => $defaultImage, 'name' => 'Ahmad Fauzi', 'birthdate' => '2015-01-01'],
            ['image' => $defaultImage, 'name' => 'Siti Nurhaliza', 'birthdate' => '2015-02-15'],
            ['image' => $defaultImage, 'name' => 'Budi Santoso', 'birthdate' => '2015-03-20'],
            ['image' => $defaultImage, 'name' => 'Lia Amalia', 'birthdate' => '2015-04-10'],
            ['image' => $defaultImage, 'name' => 'Rizky Pratama', 'birthdate' => '2015-05-05'],
            ['image' => $defaultImage, 'name' => 'Dewi Sartika', 'birthdate' => '2015-06-25'],
            ['image' => $defaultImage, 'name' => 'Fajar Nugroho', 'birthdate' => '2015-07-30'],
            ['image' => $defaultImage, 'name' => 'Nina Kartika', 'birthdate' => '2015-08-15'],
            ['image' => $defaultImage, 'name' => 'Rendi Saputra', 'birthdate' => '2015-09-01'],
            ['image' => $defaultImage, 'name' => 'Yulia Rahma', 'birthdate' => '2015-10-12'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
