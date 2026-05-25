<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    public function store(StoreEventRequest $request): RedirectResponse
    {        
        $evenData = $request-> all();

        event:: create($evenData);

        return redirect()-> route('events.index');
    }
}
