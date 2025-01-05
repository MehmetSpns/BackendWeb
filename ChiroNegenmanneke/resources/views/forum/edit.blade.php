@extends('layouts.app')

@section('content')
    <div class="forum">
        <a href="{{ route('forum.index') }}" class="btn-back">Back to Topics</a>

        <h1>Edit Topic</h1>
        <div class="forum-create-form">
            <form action="{{ route('forum.update', $topic) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $topic->title) }}" required>

                <label for="content">Content:</label>
                <textarea id="content" name="content" required>{{ old('content', $topic->content) }}</textarea>

                <button type="submit">Update Topic</button>
            </form>
        </div>
    </div>
@endsection
