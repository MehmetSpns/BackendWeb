<?php

namespace App\Http\Controllers;

use App\Models\Contact;  // Voeg het Contact model toe
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Toon de contactpagina
    public function show()
    {
        return view('contact');
    }

    // Verwerk formulierinvoer
    public function send(Request $request)
    {
        // Valideer formulierinvoer
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Sla de gegevens op in de database
        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Verstuur een eenvoudige e-mail
        $emailContent = "Naam: " . $validated['name'] . "\n" .
                        "Email: " . $validated['email'] . "\n" .
                        "Onderwerp: " . $validated['subject'] . "\n" .
                        "Bericht:\n" . $validated['message'];

        Mail::raw($emailContent, function ($message) use ($validated) {
            $message->to('mehmet.schepens@student.ehb.be')  // Vervang met het admin e-mailadres
                    ->subject('Contactformulier: ' . $validated['subject']);
        });

        // Geef een succesmelding terug
        return redirect()->route('contact.show')->with('success', 'Uw bericht is verzonden!');
    }
}
