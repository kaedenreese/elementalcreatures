<?php

namespace App\Http\Controllers;

use App\Models\Event;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = Event::orderBy('priority', 'desc')->orderBy('name', 'asc')->get();

        foreach($events as $event) {
            $raw_date = $event->date;
            $date = new DateTime($raw_date, new DateTimeZone('America/New_York'));
            $date_formatted = $date->format('M d, Y g:i A');
            if($event->recurring) $date_formatted = 'Every ' . $date->format('l') . ' at ' . $date->format('g:i A');
            $event['date'] = $date_formatted;
        }

        return view('events', ['events' => $events]);
    }
}
