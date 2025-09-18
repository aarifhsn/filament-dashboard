<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate form
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // (Option A) Send email to admin
        Mail::to('support@example.com')->send(new ContactMessage($data));

        // (Option B) You can also save to DB if needed:
        // Contact::create($data);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
