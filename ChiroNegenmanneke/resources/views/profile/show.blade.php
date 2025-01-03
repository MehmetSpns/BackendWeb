@extends('layouts.app')

@section('content')
<div class="profile-container">
    <h1 class="text-center my-4">Profile Information</h1>

    <div class="profile-details d-flex flex-column align-items-center">
        <div class="profile-picture mb-4">
            <img 
                src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.jpg') }}" 
                alt="Profile Picture" 
                class="img-fluid rounded-circle shadow" 
                style="width: 150px; height: 150px; object-fit: cover;">
        </div>

        <div class="profile-info text-center">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Birthday:</strong> {{ $user->birthday ? $user->birthday->format('F d, Y') : 'Not Provided' }}</p>
            <p><strong>About Me:</strong> {{ $user->bio ?? 'Not Provided' }}</p>
        </div>
    </div>

    <div class="profile-actions mt-4 text-center">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary px-4 py-2">Edit Profile</a>
    </div>
</div>
@endsection
