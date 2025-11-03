<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index() {
        $facilities = Facility::all();
        return view('static.facility', compact('facilities'));
    }

    public static function teaserData() {
        return Facility::take(3)->get();
    }
}
