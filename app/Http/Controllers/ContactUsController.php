<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:256',
            'email' => 'string|required|max:256',
            'message' => 'string|required|max:2048'
        ]);

        $contactus = new ContactUs($validated);

        $contactus->save();
        return view('thankyou');
    }
}
