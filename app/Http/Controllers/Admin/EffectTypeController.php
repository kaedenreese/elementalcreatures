<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EffectType;
use Illuminate\Http\Request;

class EffectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $effecttypes = EffectType::orderBy('name', 'asc')->get();

        return view('admin.effecttypes.index', ['effecttypes' => $effecttypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.effecttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:64',
            'description' => 'string|nullable|max:2047'
        ]);

        $effecttype = new EffectType($validated);
        $effecttype->save();

        return redirect()->route('admin.effecttypes.index')->with('message', "Effect Type {$effecttype->name} created!");
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
        $effecttype = EffectType::findOrFail($id);

        return view('admin.effecttypes.edit', ['effecttype' => $effecttype]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $effecttype = EffectType::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|required|max:64',
            'description' => 'string|nullable|max:2047'
        ]);

        $effecttype->update($validated);

        return redirect()->route('admin.effecttypes.index')->with('message', "Effect Type {$effecttype->name} updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $effecttype = EffectType::findOrFail($id);
        $effecttype->destroy();
        
        return redirect()->route('admin.effecttypes.index')->with('message', "Effect Type {$effecttype->name} deleted!");
    }
}
