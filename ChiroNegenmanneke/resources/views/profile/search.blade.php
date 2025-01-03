@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4 text-center mt-4">Zoek Gebruikers</h1>

    <form method="GET" action="{{ route('users.search') }}" class="mt-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control rounded-pill py-2" placeholder="Zoek op naam of gebruikersnaam" aria-label="Search">
            <button type="submit" class="btn btn-danger rounded-pill ms-2 px-4 py-2 search-btn">Zoek</button>
        </div>
    </form>

    @if(isset($users) && $users->count() > 0)
        <h2 class="mt-4">Resultaten:</h2>
        <ul class="list-group mt-3">
            @foreach($users as $user)
                <a href="{{ route('users.view', $user->id) }}" class="list-group-item d-flex align-items-center p-3 text-decoration-none text-dark">
                    <div class="profile-picture-container me-3">
                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.jpg') }}" class="profile-img" alt="{{ $user->username }}">
                    </div>
                    <div>
                        <p class="font-weight-bold mb-0">{{ $user->username }}</p>
                        <p class="text-muted mb-0">Joined: {{ $user->created_at->format('F d, Y') }}</p>
                    </div>
                </a>
            @endforeach
        </ul>
    @elseif(isset($query))
        <p class="mt-4 text-center text-muted">Geen gebruikers gevonden voor "{{ $query }}".</p>
    @endif
</div>
@endsection
