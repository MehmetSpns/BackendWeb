@extends('layouts.app')

@section('content')
<div class="profile-edit-container">
    <h1>Update Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <!-- Birthday Field -->
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : '') }}" class="form-control">
        </div>

        <!-- About Me Field -->
        <div class="form-group">
            <label for="bio">About me</label>
            <textarea id="bio" name="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <!-- Profile Picture Field -->
        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
            @if(auth()->user()->profile_picture)
                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" width="100">
                @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
