@extends('layouts.app')
@section('content')

<div>
    <h1>Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <p>You are logged in as an admin.</p>
    <p>Here you can manage the website content.</p>
    <div class="admin-actions">
       
    </div>  
</div>

@endsection
