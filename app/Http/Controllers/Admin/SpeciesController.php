<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $species = Species::orderBy('name', 'asc')->get();

        return view('admin.species.index', ['species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.species.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|max:64|required',
            'description' => 'string|max:2047|nullable'
        ]);

        $species = new Species($validated);
        $species->save();

        return redirect()->route('admin.species.index')->with('message', "Species {$species->name} created!");
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
        $species = Species::findOrFail($id);

        return view('admin.species.edit', ['species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $species = Species::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:64|required',
            'description' => 'string|max:2047|nullable'
        ]);

        $species->update($validated);

        return redirect()->route('admin.species.index')->with('message', "Species {$species->name} updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $species = Species::findOrFail($id);

        $species->delete();
        return redirect()->route('admin.species.index')->with('message', "Species {$species->name} deleted!");
    }
}
