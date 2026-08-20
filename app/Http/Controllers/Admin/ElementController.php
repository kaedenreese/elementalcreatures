<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardElement;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elements = CardElement::orderBy('name', 'asc')->get();

        return view('admin.elements.index', ['elements' => $elements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.elements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'string|max:2047'
        ]);

        $element = new CardElement($validated);

        $element->save();

        return redirect()->route('admin.elements.index')->with('message', "Element {$element->name} created!");
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
        $element = CardElement::findOrFail($id);

        return view('admin.elements.edit', ['element' => $element]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'string|max:2047'
        ]);

        $element = CardElement::findOrFail($id);
        $element->update($validated);

        return redirect()->route('admin.elements.index')->with('message', "Element {$element->name} updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $element = CardElement::findOrFail($id);
        $element->delete();

        return redirect()->route('admin.elements.index')->with('message', "Element {$element->name} deleted!");
    }
}
