<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index() {
        $facilities = Facility::all();
        return view('facility', compact('facilities'));
    }

    public static function teaserData() {
        return Facility::take(3)->get();
    }
}
