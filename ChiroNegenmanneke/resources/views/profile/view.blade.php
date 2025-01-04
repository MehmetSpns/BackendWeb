@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="profile-container mx-auto p-4 bg-light shadow rounded" style="max-width: 900px;">
        
        <div class="mb-4">
            <a href="{{ route('users.search') }}" class="btn btn-secondary">Back to Search</a>
        </div>

        <div class="d-flex">
            <div class="profile-left w-50 pr-4">
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
                </div>
            </div>

            <div class="profile-right w-50 pl-4">
                <h4>Messages</h4>

                @auth
                    <form action="{{ route('messages.store', $user->id) }}" method="POST">
                        @csrf
                        <textarea name="content" rows="3" class="form-control" placeholder="Write a message..." required></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Post Message</button>
                    </form>
                @else
                    <p class="text-muted">Please log in to post a message.</p>
                @endauth

                @foreach($messages as $message)
                    <div class="message mb-3 d-flex">
                        <strong class="mr-2">{{ $message->sender->username }}: &nbsp</strong> 
                        <span>{{ $message->content }}</span>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
