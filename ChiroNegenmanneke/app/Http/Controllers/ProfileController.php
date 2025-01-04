<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Message;  

class ProfileController extends Controller
{
    /**
     * Apply auth middleware to ensure only authenticated users can access these routes.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('view', 'search');
    }

    /**
     * Show the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your profile.');
        }

        return view('profile.show', compact('user'));
    }

    /**
     * Show the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'string|max:255|unique:users,username,' . auth()->id(), // Validate the username
            'name' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'bio' => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $user->username = $request->input('username'); 

        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->bio = $request->input('bio');

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->save();

        return redirect()->route('profile.show', $user)->with('success', 'Profile updated successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('username', 'like', "%$query%")
                    ->orWhere('name', 'like', "%$query%")
                    ->get();

        return view('profile.search', compact('users', 'query'));
    }

    public function view($id)
{
    $user = User::findOrFail($id);
    $messages = Message::where('receiver_id', $id)->latest()->get();

    return view('profile.view', compact('user', 'messages'));
}




}
