<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = Event::orderBy('priority', 'desc')->orderBy('name', 'asc')->get();

        return view('events', ['events' => $events]);
    }
}
