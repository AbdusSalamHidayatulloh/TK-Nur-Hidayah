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
         $students = [
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Ahmad Fauzi', 'birthdate' => '2015-01-01'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Siti Nurhaliza', 'birthdate' => '2015-02-15'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Budi Santoso', 'birthdate' => '2015-03-20'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Lia Amalia', 'birthdate' => '2015-04-10'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Rizky Pratama', 'birthdate' => '2015-05-05'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Dewi Sartika', 'birthdate' => '2015-06-25'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Fajar Nugroho', 'birthdate' => '2015-07-30'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Nina Kartika', 'birthdate' => '2015-08-15'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Rendi Saputra', 'birthdate' => '2015-09-01'],
            ['image' => 'image/teacherImage/guru1.jpg', 'name' => 'Yulia Rahma', 'birthdate' => '2015-10-12'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
