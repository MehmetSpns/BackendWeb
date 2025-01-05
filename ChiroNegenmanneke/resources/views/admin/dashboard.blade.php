@extends('layouts.app')

@section('content')
<div class="admin-dashboard">
    <div class="admin-container">
        <h1 class="admin-title">Dashboard</h1>
        <p class="admin-welcome">Welcome, {{ Auth::user()->name }}!</p>
        <p class="admin-role">You are logged in as an admin.</p>
        <p class="admin-description">Here you can manage the website content.</p>
        
        <div class="admin-actions">
            <a href="{{ route('admin.people') }}" class="admin-button admin-btn-primary">Manage Users</a>
            <a href="{{ route('admin.inbox') }}" class="admin-button admin-btn-secondary">Inbox</a>
        </div>
    </div>
</div>
@endsection
