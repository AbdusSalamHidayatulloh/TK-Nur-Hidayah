<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use App\Models\Facility;
use App\Models\User;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $photos = Photo::take(3)->get();
        $facilityTease = FacilityController::teaserData();
        return view('static.welcome', compact('photos', 'facilityTease'));
    }

    public function gallery()
    {
        $photos = Photo::all();
        return view('static.programs', compact('photos'));
    }

    public function show(Event $event)
    {
        $event->load('photos');

        return view('portal.event-gallery', [
            'sitename' => 'Event TK Nur Hidayah',      
            'maintitle' => $event->event_name,
            'event' => $event
        ]);
    }

    public function addPhoto(Event $event) {
        //Logic for add photos
    }
}
