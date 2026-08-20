<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Retailer;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retailers = Retailer::orderBy('priority', 'desc')->orderBy('name', 'asc')->get();

        return view('admin.retailers.index', ['retailers' => $retailers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.retailers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:64|string',
            'website' => 'string|max:256|nullable',
            'address' => 'string|max:256|nullable',
            'priority' => 'integer|nullable'
        ]);

        $retailer = new Retailer($validated);
        $retailer->save();

        return redirect()->route('admin.retailers.index')->with('message', "Retailer {$retailer->name} created!");
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
        $retailer = Retailer::findOrFail($id);

        return view('admin.retailers.edit', ['retailer' => $retailer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $retailer = Retailer::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:64|string',
            'website' => 'string|max:256|nullable',
            'address' => 'string|max:256|nullable',
            'priority' => 'integer|nullable'
        ]);

        $retailer->update($validated);

        return redirect()->route('admin.retailers.index')->with('message', "Retailer {$retailer->name} updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $retailer = Retailer::findOrFail($id);
        $retailer->destroy();

        return redirect()->route('admin.retailers.index')->with('message', "Retailer {$retailer->name} deleted!");
    }
}
