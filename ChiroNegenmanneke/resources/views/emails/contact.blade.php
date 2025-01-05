<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
</head>
<body>
    <x-alert />

    <h2>Nieuw contactformulier bericht</h2>
    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <div>
            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="subject">Onderwerp:</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
        </div>

        <div>
            <label for="message">Bericht:</label>
            <textarea name="message" id="message" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit">Verstuur bericht</button>
    </form>
</body>
</html>
