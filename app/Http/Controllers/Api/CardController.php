<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardSet;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function __invoke()
    {
        // Fetch all cards by set
        $card_data = CardSet::all();

        return response()->json($card_data);
    }
}
