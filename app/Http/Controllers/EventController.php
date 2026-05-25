<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {

        $evenData = $request-> all();

        event:: create($evenData);

        // Redirigimos
        return redirect()-> route('events.index');
    }
}
