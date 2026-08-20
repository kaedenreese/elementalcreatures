<?php

use App\Http\Controllers\Admin\CardController as AdminCardController;
use App\Http\Controllers\Admin\CardSetController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\EffectTypeController;
use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\RetailerController as AdminRetailerController;
use App\Http\Controllers\Admin\SpeciesController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RetailerController;
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

Route::get('/api/cards', CardController::class);

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');

        Route::resource('cardsets', CardSetController::class);
        Route::resource('events', AdminEventController::class);
        Route::resource('retailers', AdminRetailerController::class);
        Route::resource('elements', ElementController::class);
        Route::resource('effecttypes', EffectTypeController::class);
        Route::resource('cards', AdminCardController::class);
        Route::resource('species', SpeciesController::class);
        
        Route::get('contactus', [ContactUsController::class, 'index'])->name('contactus');
});