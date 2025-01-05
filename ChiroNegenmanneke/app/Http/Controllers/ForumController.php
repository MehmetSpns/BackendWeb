<?php

namespace App\Http\Controllers;

use App\Models\ForumTopic;
use App\Models\ForumReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $topics = ForumTopic::with('user')->latest()->get(); 
        return view('forum.index', compact('topics'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        ForumTopic::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('forum.index'); 
    }

  
    public function show(ForumTopic $topic)
    {
        $replies = $topic->replies()->with('user')->get(); 
        return view('forum.show', compact('topic', 'replies'));
    }

  
    public function storeReply(Request $request, ForumTopic $topic)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $topic->replies()->create([
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forum.show', $topic); 
    }


    public function edit(ForumTopic $topic)
    {
        if ($topic->user_id != Auth::id() && !Auth::user()->isAdmin) {
            return redirect()->route('forum.index')->with('error', 'You are not authorized to edit this topic.');
        }

        return view('forum.edit', compact('topic'));
    }

    public function update(Request $request, ForumTopic $topic)
    {
        if ($topic->user_id != Auth::id() && !Auth::user()->isAdmin) {
            return redirect()->route('forum.index')->with('error', 'You are not authorized to update this topic.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $topic->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('forum.show', $topic); 
    }

    public function destroy(ForumTopic $topic)
    {
        if ($topic->user_id != Auth::id() && !Auth::user()->isAdmin) {
            return redirect()->route('forum.index')->with('error', 'You are not authorized to delete this topic.');
        }

        $topic->delete(); 
        return redirect()->route('forum.index'); 
    }

}
