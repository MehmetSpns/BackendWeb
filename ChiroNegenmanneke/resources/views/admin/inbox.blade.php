@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inbox</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <h3>Contact E-mailadres</h3>
            @csrf
            <div class="form-group">
                <label for="contact_email">Huidig e-mailadres:</label>
                <input type="email" id="contact_email" name="contact_email" class="form-control" 
                       value="{{ $contactEmail }}" required>
            </div>
            <button type="submit" class="btn btn-success mt-2">Bijwerken</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Onderwerp</th>
                    <th>Bericht</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ Str::limit($contact->message, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.inbox.show', $contact->id) }}" class="btn btn-sm btn-primary">Bekijken</a>
                            <form action="{{ route('admin.inbox.delete', $contact->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Weet u zeker dat u dit bericht wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $contacts->links() }}
</div>
@endsection
