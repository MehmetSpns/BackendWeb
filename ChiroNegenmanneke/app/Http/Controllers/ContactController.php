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
    
        try {
            Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
            ]);
    
            $admins = \App\Models\User::where('isAdmin', true)->get();
    
            $emailContent = "Naam: " . $validated['name'] . "\n" .
                            "Email: " . $validated['email'] . "\n" .
                            "Onderwerp: " . $validated['subject'] . "\n" .
                            "Bericht:\n" . $validated['message'];
    
            foreach ($admins as $admin) {
                Mail::raw($emailContent, function ($message) use ($admin) {
                    $message->to($admin->email)
                            ->subject('Nieuw Contactformulier Bericht');
                });
            }
    
            return redirect()->route('contact.show')->with('success', 'Uw bericht is verzonden!');
        } catch (\Exception $e) {
            return redirect()->route('contact.show')->with('error', 'Er is een fout opgetreden bij het verzenden van uw bericht. Probeer het opnieuw.');
        }
    }
    
}
