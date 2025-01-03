@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bericht Bekijken</h1>
    <div class="card">
        <div class="card-header">
            Onderwerp: {{ $contact->subject }}
        </div>
        <div class="card-body">
            <p><strong>Naam:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Bericht:</strong></p>
            <p>{{ $contact->message }}</p>
            <a href="mailto:{{ $contact->email }}" class="btn btn-primary">Antwoorden</a>
        </div>
    </div>
    <a href="{{ route('admin.inbox') }}" class="btn btn-secondary mt-3">Terug naar Inbox</a>
</div>
@endsection
