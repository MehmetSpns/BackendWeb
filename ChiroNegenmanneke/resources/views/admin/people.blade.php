@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-5">
        <h2>Nieuwe Gebruiker Toevoegen</h2>
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="isAdmin">Maak admin</label>
                <input type="checkbox" name="isAdmin" id="isAdmin">
            </div>
            <button type="submit" class="btn btn-success">Voeg Gebruiker Toe</button>
        </form>
    </div>

    <div class="mb-4">
        <h1>Beheer Gebruikers</h1>
        <form method="GET" action="{{ route('admin.people') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Zoek gebruiker op naam..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Zoeken</button>
                </div>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->isAdmin ? 'Admin' : 'Normaal' }}</td>
                    <td>
                        <form action="{{ route('admin.user.updateRole', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">
                                {{ $user->isAdmin ? 'Demoteer naar normaal' : 'Maak admin' }}
                            </button>
                        </form>
                        <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
