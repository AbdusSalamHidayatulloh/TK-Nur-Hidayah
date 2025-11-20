<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request) {
        if($request->has('eventSearch')) {
            return view('portal.event', [
                'sitename' => $request->eventSearch,
                'maintitle' => 'Event Searched: '.$request->eventSearch,
                'events' => Event::where('event_name', 'like', '%'.$request->eventSearch.'%')
                ->paginate(6)
                ->withQueryString(),
            ]);
        } else {
            return view('portal.event', [
                'sitename' => 'Event TK',
                'maintitle' => 'Event TK Nur Hidayah',
                'events' => Event::paginate(6)
            ]);
        }
    }

    public function makeEvent(EventRequest $request) {
        $user = $request->user();
        if($user->role === 'admin') {
            $validateData = $request->validate($request->rules());
            Event::create([
                'event_name' => $validateData['event_name'],
                'event_date_start' => $validateData['event_date_start'],
                'event_date_end' => $validateData['event_date_end'],
                'event_description' => $validateData['event_description'],
            ]);

            return redirect()->back()->with('Success', 'an event has already been made succesfully');
        } else {
            abort('400', 'Unauthorized Accesss');
        }
    }

    public function deleteEvent(EventRequest $request, Int $eventId) {
        $user = $request->user();
        if($user->role === 'admin') {
            $event = Event::findOrFail($eventId);
            $event->delete();
            return redirect()->back()->with('Success', 'an event has already been deleted succesfully');
        } else {
            abort('403', 'Unauthorized Accesss');
        }
    }

    public function updateEvent(EventRequest $request, Int $eventId) {
        $user = $request->user();
        if($user->role === 'admin') {
            $validateData = $request->validate();
            $event = Event::findOrFail($eventId);
            $event->update([
                'event_name' => $validateData['event_name'] ?? $event->event_name,
                'event_date_start' => $validateData['event_date_start'] ?? $event->event_date_start,
                'event_date_end' => $validateData['event_date_end'] ?? $event->event_date_end,
                'event_description' => $validateData['event_description'] ?? $event->event_description,
            ]);
            return redirect()->back()->with('Success', 'an event has already been updated succesfully');
        } else {
            abort('400', 'Unauthorized Accesss');
        }
    }
}
