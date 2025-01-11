<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;

class MessageController extends Controller
{
    public function store(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Message::create([
            'sender_id' => auth()->id(),  
            'receiver_id' => $userId,    
            'content' => $request->content,
        ]);

        return redirect()->route('users.view', $userId)->with('success', 'Message posted!');
    }

    
}
