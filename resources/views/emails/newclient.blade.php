<!DOCTYPE html>
<html>
<head>
    <title>New Client Created</title>
</head>
<body>
    <h1>A new client has been created!</h1>
    <p>Client Name: {{ $client->first_name }} {{ $client->last_name }}</p>
    <p>Client Email: {{ $client->email }}</p>
    <p>Created by Practitioner: {{ $practitioner->first_name }} {{ $practitioner->last_name }}</p>
</body>
</html>
