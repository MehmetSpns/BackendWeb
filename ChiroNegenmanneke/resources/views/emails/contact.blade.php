<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
</head>
<body>
    <h2>Nieuw contactformulier bericht</h2>
    <p><strong>Naam:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Onderwerp:</strong> {{ $subject }}</p>
    <p><strong>Bericht:</strong></p>
    <p>{{ $message }}</p>
</body>
</html>
