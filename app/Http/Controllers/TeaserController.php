<?php

namespace App\Http\Controllers;


use App\Models\Photo;

class TeaserController extends Controller
{
    public function index() {
        $photos = Photo::take(3)->get();
        return view('welcome', compact('photos'));
    }
}
