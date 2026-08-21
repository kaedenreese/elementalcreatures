<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardElement;
use App\Models\CardSet;
use App\Models\Species;
use Exception;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function __invoke()
    {
        // Fetch all cards by set
        $cardsets = CardSet::where('public', '1')->get();
        $return_body = [];
        for($i = 0; $i < sizeof($cardsets); $i++) {
            $cards = $cardsets[$i]->cards;
            foreach($cards as $card) {
                try{
                    $card['effect_type'] = $card->effect_type;
                }
                catch (Exception $e) {
                    return response()->json(['message' => $e->getMessage()]);
                }

                try {
                    $card['elements'] = $card->elements;
                }
                catch (Exception $e) {
                    return response()->json(['message' => $e->getMessage()]);
                }
                try {
                $card['species_name'] = $card->species->name;
                }
                catch (Exception $e) {
                    return response()->json(['message' => $e->getMessage()]);
                }
            }

            $return_body[$i] = [
                "id" => $cardsets[$i]->id,
                "set_name" => $cardsets[$i]->name,
                "cards" => $cards
            ];
        }

        return response()->json($return_body);
    }
}
