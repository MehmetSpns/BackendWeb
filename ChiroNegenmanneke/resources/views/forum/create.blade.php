@extends('layouts.app')

@section('content')
    <div class="forum">
        <a href="{{ route('forum.index') }}" class="btn-back">Back to Topics</a>
        <h1>Create a New Topic</h1>
        <div class="forum-create-form">
            <form action="{{ route('forum.store') }}" method="POST">
                @csrf
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea>
                <button type="submit">Create Topic</button>
            </form>
        </div>
    </div>
@endsection
