<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\Event;
use App\Models\Photo;
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

        return view('portal.show-event', [
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
            $path = $photo->store('image/events', 'public');
            $event->photos()->create([
                'title' => $event->event_name,
                'image_path' => $path,
                'date_taken' => now()
            ]);
        }

        return redirect('/event/' . $event->id)->with('Success', 'Photos added successfully to the event');
    }

    public function deletePhoto(PhotoRequest $request, Photo $photo)
    {
        if ($request->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        if ($photo->image_path && Storage::disk('public')->exists($photo->image_path)) {
            Storage::disk('public')->delete($photo->image_path);
        }
        $photo->delete();
        return back()->with('Success', 'Photo deleted successfully!');
    }

    public function updatePhoto(PhotoRequest $request, Photo $photo)
    {
        if ($request->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $validateData = $request->validated();

        if ($request->hasFile('image_path')) {
            if ($photo->image_path && Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }

            $path = $request->file('image_path')->store('image/events', 'public');
            $photo->image_path = $path;
        }

        $photo->update([
            'title' => $validateData['title'] ?? $photo->title,
            'date_taken' => $validateData['date_taken'] ?? $photo->date_taken,
            'image_path' => $photo->image_path
        ]);

        return back()->with('Success', 'Photo updated successfully!');
    }
}
