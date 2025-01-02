@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contactpagina</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Onderwerp</label>
            <input type="text" name="subject" class="form-control" id="subject" value="{{ old('subject') }}" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Bericht</label>
            <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Versturen</button>
    </form>
</div>
@endsection
