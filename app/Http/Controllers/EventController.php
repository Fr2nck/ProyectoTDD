<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{


    public function index(): View
    {
        $events = Event::all();
        return view('events.index',['events' => $events]);
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {        
        $evenData = $request-> all();

        event:: create($evenData);

        return redirect()-> route('events.index');
    }

    public function update(Request $request, Event $event)
    {
        $event->update($request->all());

        return response()->json($event, 200); 
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return response(null, 204); 
    }
}
