@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="display-4 text-center">Edit News</h1>

    <form action="{{ route('news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $newsItem->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $newsItem->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($newsItem->image)
                <img src="{{ asset('storage/' . $newsItem->image) }}" class="mt-3" width="200">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update News</button>
    </form>
</div>
@endsection
