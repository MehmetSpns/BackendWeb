<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', \App\Http\Middleware\AdminMiddelware::class]);
    }

    
    public function index()
    {
        return view('admin.dashboard');
    }

    
    public function people(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
        ->paginate(10); 

        return view('admin.people', compact('users'));
    }


    public function updateRole($id)
    {
        $user = User::findOrFail($id);

      
        $user->isAdmin = !$user->isAdmin;

      
        $user->save();

        
        return redirect()->route('admin.people')->with('success', $user->isAdmin ? 'Gebruiker is nu een admin!' : 'Gebruiker is nu een normale gebruiker!');
    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.people')->with('success', 'Gebruiker succesvol verwijderd!');
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'isAdmin' => $request->has('isAdmin'),
        ]);

        return redirect()->route('admin.people')->with('success', 'Nieuwe gebruiker toegevoegd!');
    }
}
