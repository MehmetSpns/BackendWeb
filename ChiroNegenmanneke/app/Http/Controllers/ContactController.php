<?php

namespace App\Http\Controllers;

use App\Models\Contact;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    Contact::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'subject' => $validated['subject'],
        'message' => $validated['message'],
    ]);

    $contactEmail = \App\Models\Setting::where('key', 'contact_email')->value('value');

    $emailContent = "Naam: " . $validated['name'] . "\n" .
                    "Email: " . $validated['email'] . "\n" .
                    "Onderwerp: " . $validated['subject'] . "\n" .
                    "Bericht:\n" . $validated['message'];

    Mail::raw($emailContent, function ($message) use ($validated, $contactEmail) {
        $message->to($contactEmail)
                ->subject('Contactformulier: ' . $validated['subject']);
    });

    return redirect()->route('contact.show')->with('success', 'Uw bericht is verzonden!');
}

}
