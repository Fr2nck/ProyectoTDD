<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;

class EventController extends Controller
{
    public function store(StoreEventRequest $request)
    {

        $evenData = $request-> all();

        event:: create($evenData);

        // Redirigimos
        return redirect()-> route('events.index');
    }
}
