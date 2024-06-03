<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Service</title>
</head>
<body>
    <h1>Hello, {{ $client->first_name }}!</h1>
    <p>Here are new informations about your account.</p>
    <p>Name: {{ $client->first_name }} {{ $client->last_name }}</p>
    <p>Email: {{ $client->email }}</p>
    <p>Your practitioner: {{ $practitioner->first_name }} {{ $practitioner->last_name }}</p>
    <p>Practitioner's email: {{ $practitioner->email }}</p>
    <p>Feel free to reach out to us if you have any questions.</p>
</body>
</html>