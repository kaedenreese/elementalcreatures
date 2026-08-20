<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardSet;
use Illuminate\Http\Request;

class CardSetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cardsets = CardSet::orderBy('release_date')->get();

        return view('admin.cardsets.index', ['cardsets' => $cardsets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cardsets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|max:64|required',
            'description' => 'string|max:2047',
            'release_date' => 'date'
        ]);

        $cardset = new CardSet($validated);
        $cardset->save();

        return redirect()->route('admin.cardsets.index')->with('message', "Card set {$cardset->name} created!");
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
        $cardset = CardSet::findOrFail($id);

        return view('admin.cardsets.edit', ['cardset' => $cardset]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:64|required',
            'description' => 'string|max:2047',
            'release_date' => 'date'
        ]);

        $cardset = CardSet::findOrFail($id);
        $cardset->update($validated);

        return redirect()->route('admin.cardsets.index')->with('message', "Card set {$cardset->name} updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cardset = CardSet::findOrFail($id);

        $cardset->delete();

        return redirect()->route('admin.cardsets.index')->with('message', "Card set {$cardset->name} deleted!");
    }
}
