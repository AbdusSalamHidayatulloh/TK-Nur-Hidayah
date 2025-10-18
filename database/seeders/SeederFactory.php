<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederFactory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facility::factory()->count(4)->create();
    }
}
