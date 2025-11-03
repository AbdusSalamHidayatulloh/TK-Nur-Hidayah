<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Facility;

class ContentController extends Controller
{
    public function index() {
        $photos = Photo::take(3)->get();
        $facilityTease = FacilityController::teaserData();
        return view('static.welcome', compact('photos', 'facilityTease'));
    }

    public function gallery() {
        $photos = Photo::all();
        return view('static.programs', compact('photos'));
    }
}
