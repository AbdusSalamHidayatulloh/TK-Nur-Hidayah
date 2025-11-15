<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\Event;
use App\Models\Photo;
use App\Models\Facility;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function addPhoto(PhotoRequest $request, Event $event)
    {
        if (!$request->hasFile('photos')) {
            return redirect()->back()->withErrors('No photos uploaded');
        }
        $request->validated();
        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('eventImage', 'public');
            $event->photos()->create([
                'path' => $path,
                'taken_at' => $request->input('taken_at')
            ]);
        }
        return redirect()->back()->with('Success', 'Photos added successfully to the event');
    }

    public function deletePhoto(PhotoRequest $request, Photo $photo)
    {
        if ($request->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        if ($photo->path && Storage::disk('public')->exists($photo->path)) {
            Storage::disk('public')->delete($photo->path);
        }
        $photo->delete();
        return back()->with('Success', 'Photo deleted successfully!');
    }
}
