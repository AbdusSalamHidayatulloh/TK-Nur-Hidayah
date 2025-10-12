<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Photo::insert([
            [
                'title' => 'Belajar bersama native speaker',
                'image_path' => '/image/native_speaker.jpg'
            ],
            [
                'title' => 'Edukasi kesehatan bersama Yakult',
                'image_path' => '/image/edukasi_yakult.jpg'
            ],
            [
                'title' => 'Pengenalan Akademi Militer',
                'image_path' => '/image/pengenalan_akmil.jpg'
            ],
            [
                'title' => 'Kegiatan belajar bahasa Jawa',
                'image_path' => '/image/kegiatan_bahasa.jpg'
            ],
            [
                'title' => 'Kegiatan belajar bahasa Inggris',
                'image_path' => '/image/kegiatan_bahasa_inggris.jpg'
            ],
            [
                'title' => 'Kegiatan Kirab Maulid Nabi',
                'image_path' => '/image/kirab_maulid_nabi.jpg'
            ],
            [
                'title' => 'Manasik / Latihan Haji',
                'image_path' => '/image/manasik_haji.jpg'
            ],
            [
                'title' => 'Mengaji Ummi',
                'image_path' => '/image/mengaji__ummi.jpg'
            ],
        ]);
    }
}
