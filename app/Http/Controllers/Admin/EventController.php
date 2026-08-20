<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('date', 'asc')->orderBy('name', 'asc')->get();

        return view('admin.events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:128|string',
            'description' => 'required|string|max:2048',
            'address' => 'nullable|string|max:256',
            'date' => 'date|required',
            'priority' => 'integer|nullable'
        ]);

        if($request->has('online')) $validated['online'] = 1;
        if($request->has('recurring')) $validated['recurring'] = 1;

        $event = new Event($validated);

        $event->save();

        return redirect()->route('admin.events.index')->with('message', "Event {$event->name} created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);

        return view('admin.events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:128|string',
            'description' => 'required|string|max:2048',
            'address' => 'nullable|string|max:256',
            'date' => 'date|required',
            'priority' => 'integer|nullable'
        ]);

        if($request->has('online')) $validated['online'] = 1;
        else $validated['online'] = 0;
        if($request->has('recurring')) $validated['recurring'] = 1;
        else $validated['recurring'] = 0;

        $event = Event::findOrFail($id);
        $event->update($validated);

        return redirect()->route('admin.events.index')->with('message', "Event {$event->name} updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('message', "Event {$event->name} deleted!");
    }
}
