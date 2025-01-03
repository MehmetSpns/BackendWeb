@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwe Vraag Toevoegen aan {{ $category->name }}</h1>

    <form action="{{ route('admin.faq.storeQuestion', $category->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">Vraag</label>
            <input type="text" name="question" id="question" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="answer">Antwoord</label>
            <textarea name="answer" id="answer" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Vraag Toevoegen</button>
    </form>
</div>
@endsection
