@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="display-4 text-center mb-4">{{ $newsItem->title }}</h1>

    <div class="card shadow-lg">
        <img src="{{ asset('storage/' . $newsItem->image) }}" class="card-img-top news-image" alt="{{ $newsItem->title }}">

        <div class="card-body">
            <h1 class="card-title">{{ $newsItem->title }}</h1>
            <p class="card-text">{{ $newsItem->content }}</p>
            <p class="text-muted">Published on: {{ $newsItem->publication_date->format('F j, Y') }}</p>

            @if(auth()->check() && auth()->user()->isAdmin)
                <div class="mt-4 d-flex justify-content-start">
                    <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning mr-3">Edit</a>
                    <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endif

            <!-- Back to news list button -->
            <div class="mt-4 text-center">
                <a href="{{ route('news.index') }}" class="btn btn-secondary">Back to News List</a>
            </div>
        </div>
    </div>
</div>
@endsection
