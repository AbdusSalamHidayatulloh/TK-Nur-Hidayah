<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventId = DB::table('events')->insertGetId([
            'event_name'        => 'PromosiWebsite',
            'event_date_start'  => Carbon::now()->format('Y-m-d'),        // store as string
            'event_date_end'    => Carbon::now()->addMonth()->format('Y-m-d'),
            'event_description' => 'Promosi kegiatan TK/KB Nur Hidayah untuk memperkenalkan website dan fasilitas.',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
    }
}
