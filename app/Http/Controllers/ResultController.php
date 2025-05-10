<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    
    public function contact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

        Contact::create([
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        // Return a success response
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


}
