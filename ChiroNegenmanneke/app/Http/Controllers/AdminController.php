<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Apply auth middleware to ensure only authenticated users can access these routes.
     */
   

    /**
     * Show the admin dashboard.
        *
        * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
