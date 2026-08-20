<?php

namespace App\Http\Controllers;

use App\Models\CardElement;
use App\Models\CardSet;
use App\Models\Species;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        $elements = CardElement::all();
        $species = Species::all();
        $cardsets = CardSet::all();

        return view('gallery', [
            'elements' => $elements,
            'species' => $species,
            'cardsets' => $cardsets
        ]);
    }
}
