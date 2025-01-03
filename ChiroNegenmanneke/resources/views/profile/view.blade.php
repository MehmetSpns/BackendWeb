@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="profile-container mx-auto p-4 bg-light shadow rounded" style="max-width: 600px;">
        <div class="text-center mb-4">
            <h1 class="mb-2">{{ $user->username }}</h1>
            <small class="text-muted">Joined {{ $user->created_at->format('F Y') }}</small>
        </div>
        <div class="text-center">
            <div class="profile-picture mb-3">
                <img 
                    src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.jpg') }}" 
                    alt="{{ $user->username }}'s Profile Picture" 
                    class="img-fluid rounded-circle shadow" 
                    style="width: 150px; height: 150px; object-fit: cover;">
            </div>

            <div class="profile-bio mt-3">
                <h4>About Me</h4>
                <p class="text-muted">{{ $user->bio ?? 'This user has not shared anything about themselves yet.' }}</p>
            </div>

            <div class="mt-4">
                <a href="{{ route('users.search') }}" class="btn btn-secondary">Back to Search</a>
            </div>
        </div>
    </div>
</div>
@endsection
