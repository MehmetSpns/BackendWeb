@extends('layouts.app')

@section('content')
    <div class="forum">
        <a href="{{ route('forum.index') }}" class="btn-back">Back to Topics</a>

        <div class="forum-topic-details">
            <h1 class="forum-topic-title">{{ $topic->title }}</h1>
            <div class="forum-topic-meta">
                Posted by {{ $topic->user->name }} on {{ $topic->created_at->format('d M Y') }}
            </div>
            <div class="forum-topic-content">
                {{ $topic->content }}
            </div>
        </div>

        @if (Auth::id() == $topic->user_id || Auth::user()->isAdmin)
            <div class="forum-topic-actions">
                <a href="{{ route('forum.edit', $topic) }}" class="btn-edit-topic-action">Edit</a>
                <form action="{{ route('forum.destroy', $topic) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete-topic-action" onclick="return confirm('Are you sure you want to delete this topic?')">Delete</button>
                </form>
            </div>
        @endif


        <div class="forum-reply-form">
            <form action="{{ route('forum.reply.store', $topic) }}" method="POST">
                @csrf
                <textarea name="content" required></textarea>
                <button type="submit">Reply</button>
            </form>
        </div>

        <div class="forum-replies">
            @foreach($replies as $reply)
                <div class="forum-reply">
                    <div class="forum-reply-meta">
                        <strong>{{ $reply->user->name }}</strong> - {{ $reply->created_at->format('d M Y') }}
                    </div>
                    <div class="forum-reply-content">
                        {{ $reply->content }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
