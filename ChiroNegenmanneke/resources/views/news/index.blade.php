@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="display-4 text-center">Latest News</h1>

    @if(auth()->check() && auth()->user()->isAdmin)
        <div class="mb-4 text-center">
            <a href="{{ route('news.create') }}" class="btn btn-success btn-lg">Add News</a>
        </div>
    @endif

    <div class="row">
        @foreach($newsItems as $newsItem)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('storage/' . $newsItem->image) }}" class="card-img-top" alt="{{ $newsItem->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $newsItem->title }}</h5>
                        <p class="card-text">{{ strlen($newsItem->content) > 50 ? substr($newsItem->content, 0, 50) . '...' : $newsItem->content }}</p>
                        <a href="{{ route('news.show', $newsItem->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
