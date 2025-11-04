<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@nur.hidayah.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Anna Anugrah',
            'email' => 'anna@nur.hidayah.com',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
        User::create([
            'name' => 'Muhammad Anugrah',
            'email' => 'Muhammad@nur.hidayah.com',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
    }
}
