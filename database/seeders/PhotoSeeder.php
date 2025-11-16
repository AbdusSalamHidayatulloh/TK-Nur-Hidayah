<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Photo;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = Event::where('event_name', 'PromosiWebsite')->first();

        if (!$event) {
            $this->command->error('Event "PromosiWebsite" not found! Run EventSeeder first.');
            return;
        }
        $photos = [
            [
                'title' => 'Belajar bersama native speaker',
                'image_path' => '/image/native_speaker.jpg',
                'date_taken' => Carbon::now()
            ],
            [
                'title' => 'Edukasi kesehatan bersama Yakult',
                'image_path' => '/image/edukasi_yakult.jpg',
                'date_taken' => Carbon::now()
            ],
            [
                'title' => 'Pengenalan Akademi Militer',
                'image_path' => '/image/pengenalan_akmil.jpg',
                'date_taken' => Carbon::now()
            ],
            [
                'title' => 'Kegiatan belajar bahasa Jawa',
                'image_path' => '/image/kegiatan_bahasa.jpg',
                'date_taken' => Carbon::now()
            ],
            [
                'title' => 'Kegiatan belajar bahasa Inggris',
                'image_path' => '/image/kegiatan_bahasa_inggris.jpg',
                'date_taken' => Carbon::now()
            ],
            [
                'title' => 'Kegiatan Kirab Maulid Nabi',
                'image_path' => '/image/kirab_maulid_nabi.jpg',
                'date_taken' => Carbon::now()
            ],
            [
                'title' => 'Manasik / Latihan Haji',
                'image_path' => '/image/manasik_haji.jpg',
                'date_taken' => Carbon::now()
            ],
            [
                'title' => 'Mengaji Ummi',
                'image_path' => '/image/mengaji__ummi.jpg',
                'date_taken' => Carbon::now()
            ],
        ];

        foreach ($photos as $photo) {
            Photo::create([
                'event_id' => $event->id,
                'image_path' => $photo['image_path'],
                'title' => $photo['title'],
                'date_taken' => Carbon::now(),
            ]);
        }
    }
}
