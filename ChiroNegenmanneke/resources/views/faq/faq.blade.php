@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="faq-header text-center mb-5">
        <h1 class="display-4">Frequently Asked Questions</h1>
    </div>

    @foreach($categories as $category)
        <div class="faq-category card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="card-title">{{ $category->name }}</h2>
                
                <ul class="list-group">
                    @foreach($category->questions as $question)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <strong>{{ $question->question }}</strong>
                                <p>{{ $question->answer }}</p>
                            </div>

                            <div class="btn-group" role="group" aria-label="Actions">
                                @if (auth()->check() && auth()->user()->isAdmin)
                                    <a href="{{ route('admin.faq.editQuestion', $question->id) }}" class="btn btn-warning btn-sm">Update</a>
                                @endif
                                @if (auth()->check() && auth()->user()->isAdmin)
                                    <form action="{{ route('admin.faq.destroyQuestion', $question->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>

                @if (auth()->check() && auth()->user()->isAdmin)
                    <a href="{{ route('admin.faq.createQuestion', $category->id) }}" class="btn btn-primary mt-3">Add Question</a>
                @endif

                @if (auth()->check() && auth()->user()->isAdmin)
                    <form action="{{ route('admin.faq.destroyCategory', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mt-3">Delete Category</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach

    @if (auth()->check() && auth()->user()->isAdmin)
        <a href="{{ route('admin.faq.createCategory') }}" class="btn btn-success btn-lg mt-4 d-block mx-auto">Add Category</a>
    @endif
</div>
@endsection
