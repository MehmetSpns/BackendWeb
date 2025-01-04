@extends('layouts.app')

@section('content')
<div class="news-item-container">
    <div class="news-header">
        <h1 class="news-title">{{ $newsItem->title }}</h1>
        <p class="news-date">Published on: {{ $newsItem->publication_date->format('F j, Y') }}</p>
    </div>

    <div class="news-content">
        <img class="news-image" src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}">

        <div class="news-body-container">
            <p class="news-body">{{ $newsItem->content }}</p>
        </div>

        @if(auth()->check() && auth()->user()->isAdmin)
            <div class="admin-actions">
                <a class="btn btn-edit" href="{{ route('news.edit', $newsItem->id) }}">Edit</a>
                <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">Delete</button>
                </form>
            </div>
        @endif

        <div class="back-to-list">
            <a class="btn btn-back" href="{{ route('news.index') }}">Back to News List</a>
        </div>
    </div>

    <div class="comments-section">
        <h2 class="comments-title">Comments</h2>

        @forelse($newsItem->comments as $comment)
            <div class="comment">
                <p class="comment-username">{{ $comment->user->name }}: &nbsp</p>
                <p class="comment-body">{{ $comment->content }}</p>
            </div>
        @empty
            <p class="no-comments">No comments yet. Be the first to comment!</p>
        @endforelse

        @auth
            <form action="{{ route('comments.store', $newsItem->id) }}" method="POST" class="comment-form">
                @csrf
                <textarea name="content" rows="3" class="comment-input" placeholder="Leave a comment..." required></textarea>
                <button type="submit" class="btn btn-submit-comment">Post Comment</button>
            </form>
        @else
            <p class="login-prompt"><a href="{{ route('login') }}">Log in</a> to post a comment.</p>
        @endauth
    </div>
</div>
@endsection
