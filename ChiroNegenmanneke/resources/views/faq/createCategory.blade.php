@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwe Categorie Toevoegen</h1>

    <form action="{{ route('admin.faq.storeCategory') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Categorie Naam</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Categorie Toevoegen</button>
    </form>
</div>
@endsection
