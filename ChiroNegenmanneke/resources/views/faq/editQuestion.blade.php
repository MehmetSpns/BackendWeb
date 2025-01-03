@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vraag Bewerken: {{ $question->question }}</h1>

    <form action="{{ route('admin.faq.updateQuestion', $question->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="question">Vraag</label>
            <input type="text" name="question" id="question" class="form-control" value="{{ old('question', $question->question) }}" required>
        </div>

        <div class="form-group">
            <label for="answer">Antwoord</label>
            <textarea name="answer" id="answer" class="form-control" required>{{ old('answer', $question->answer) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Vraag Bijwerken</button>
    </form>
</div>
@endsection
