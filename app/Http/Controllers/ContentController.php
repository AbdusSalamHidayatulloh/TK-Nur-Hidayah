<?php

namespace App\Http\Controllers;

use App\Models\Photo;

class ContentController extends Controller
{
    public function index() {
        $photos = Photo::take(3)->get();
        return view('welcome', compact('photos'));
    }

    public function gallery() {
        $photos = Photo::all();
        return view('programs', compact('photos'));
    }
}
