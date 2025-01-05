@extends('layouts.app')

@section('content')
    <div class="forum">
        <h1 class="forum-title">Forum Topics</h1>
        
        <div class="forum-header">
            <a href="{{ route('forum.create') }}" class="btn-create-topic">Create a New Topic</a>
        </div>

        <div class="forum-topic-list">
            @foreach ($topics as $topic)
                <a href="{{ route('forum.show', $topic) }}" class="forum-topic-link">
                    <div class="forum-topic-container">
                        <h2 class="forum-topic-title">{{ $topic->title }}</h2>
                        <div class="forum-topic-meta">
                            Posted by {{ $topic->user->name }} on {{ $topic->created_at->format('d M Y') }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
