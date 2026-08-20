<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardElement;
use App\Models\CardSet;
use App\Models\EffectType;
use App\Models\Species;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cardsets = CardSet::all();
        $cardset_names = [];
        foreach($cardsets as $cardset) {
            array_push($cardset_names, ['id' => $cardset['id'], 'name' => $cardset['name']]);
        }
        $cards = Card::orderBy('card_set_id', 'asc')->orderBy('number', 'asc')->paginate(50);
        
        foreach($cards as $card) {
            $card['cardset_name'] == 'Undefined';
            for($i = 0; $i < sizeof($cardset_names); $i++) {
                if($cardset_names[$i]['id'] == $card['card_set_id']) $card['cardset_name'] = $cardset_names[$i]['name'];
            }
        }
        
        return view('admin.cards.index', [
            'cards' => $cards
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cardsets = CardSet::all();
        $elements = CardElement::all();
        $species = Species::all();
        $effect_types = EffectType::all();

        return view('admin.cards.create', [
            'cardsets' => $cardsets,
            'elements' => $elements,
            'species' => $species,
            'effect_types' => $effect_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'power' => 'required|integer',
            'effect' => 'required|string|max:1024',
            'number' => 'required|integer',
            'level' => 'required|integer',
        ]);

        $validated['card_set_id'] = $request->card_set_id;
        $validated['species_id'] = $request->species_id;
        $validated['effect_type_id'] = $request->effect_type_id;

        $card = new Card($validated);
        $card->save();

        if($request->has('elements')) {
            foreach($request->elements as $element) {
                $element_model = CardElement::findOrFail($element);
                $card->elements()->attach($element_model);
            }
        }

        return redirect()->route('admin.cards.create')->with('message', "Card {$card->name} created!");
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
        $cardsets = CardSet::all();
        $elements = CardElement::all();
        $species = Species::all();
        $effect_types = EffectType::all();

        $card = Card::findOrFail($id);
        
        $card_elements = [];

        foreach ($card->elements as $element) {
            array_push($card_elements, $element['id']);
        }

        return view('admin.cards.edit', [
            'card' => $card,
            'cardsets' => $cardsets,
            'elements' => $elements,
            'species' => $species,
            'effect_types' => $effect_types,
            'card_elements' => $card_elements
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'card_set_id' => 'required|integer',
            'power' => 'required|integer',
            'effect' => 'required|string|max:1024',
            'number' => 'required|integer',
            'level' => 'required|integer',
            'species_id' => 'required|integer',
            'effect_type_id' => 'required|integer'
        ]);

        $card = Card::findOrFail($id);

        $card->update($validated);

        $card->elements()->detach();
        if($request->has('elements')) {
            foreach($request->elements as $element) {
                $card->elements()->attach($element);
            }
        }

        return redirect()->route('admin.cards.create')->with('message', "Card {$card->name} updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $card = Card::findOrFail($id);

        $card->delete();
        return redirect()->route('admin.cards.create')->with('message', "Card {$card->name} deleted!");
    }
}
