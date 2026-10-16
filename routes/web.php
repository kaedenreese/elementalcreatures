<?php

use App\Http\Controllers\Admin\CardController as AdminCardController;
use App\Http\Controllers\Admin\CardSetController;
use App\Http\Controllers\Admin\ContactUsController as AdminContactUsController;
use App\Http\Controllers\Admin\EffectTypeController;
use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\RetailerController as AdminRetailerController;
use App\Http\Controllers\Admin\SpeciesController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RetailerController;
use App\Models\CardSet;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/admin/login', [AuthController::class, 'login'])->name('doLogin');
Route::post('/register', [AuthController::class, 'register'])->name('doRegister');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/retailers', [RetailerController::class, 'index'])->name('retailers');
Route::view('/howtoplay', 'howtoplay')->name('howtoplay');
Route::view('/live', 'live')->name('live');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::view('/contactus', 'contactus')->name('contactus');
Route::post('/contactus', ContactUsController::class)->name('doContactus');
Route::view('/thankyou', 'thankyou')->name('thankyou');

Route::get('/api/cards', CardController::class);
Route::get('/api/tcg-arena', function() {
    $path = '.';

    $comma = '';
    $cardsets = CardSet::where('public', '1')->get();
    $return_body = '{' . PHP_EOL;
    for($i = 1; $i < sizeof($cardsets); $i++) {
        $cards = $cardsets[$i]->cards;
        foreach($cards as $card) {
            if($card->number < 100) $card->number = '0' . $card->number;
            if($card->number < 10) $card->number = '0' . $card->number;
            $elements = [];
            foreach($card->elements as $element) {
                array_push($elements, $element->name);
            }
            $card_json = $comma . '"' . $card->card_set_id . '.' . $card->number . '": {
                    "id": "' . $card->card_set_id . '.' . $card->number . '",
                    "type": "Creature",
                    "face": {
                        "front": {
                            "name": { "name": "' . $card->name . '" },
                            "type": "Creature",
                            "cost": 0,
                            "image": "https://elementalcreaturestcg.com/images/cards/sets/' . $card->card_set_id . '/fullsize/' . $card->number . '.png"
                        }
                    },
                    "name": "' . $card->name . '",
                    "Species": "' . $card->species->name . '",
                    "Elements": ' . json_encode($elements) . ',
                    "Level": ' . $card->level . ',
                    "cost": 0,
                    "legality": {
                         "STD": true
                    }
                }';
            $comma = ',' . PHP_EOL;
            $return_body .= $card_json;
        }
    }
    $return_body .= '}';

    if(!file_exists($path)) {
        mkdir($path);
    }
    file_put_contents($path . '/cards.json', $return_body);

    return 'cards.json has been updated';
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');

        Route::resource('cardsets', CardSetController::class);
        Route::resource('events', AdminEventController::class);
        Route::resource('retailers', AdminRetailerController::class);
        Route::resource('elements', ElementController::class);
        Route::resource('effecttypes', EffectTypeController::class);
        Route::resource('cards', AdminCardController::class);
        Route::resource('species', SpeciesController::class);
        Route::resource('contactus', AdminContactUsController::class);
});