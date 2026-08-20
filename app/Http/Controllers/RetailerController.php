<?php

namespace App\Http\Controllers;

use App\Models\Retailer;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    public function index() {
        $retailers = Retailer::orderBy('priority', 'desc')->orderBy('name', 'asc')->get();

        return view('retailers', ['retailers' => $retailers]);
    }
}
