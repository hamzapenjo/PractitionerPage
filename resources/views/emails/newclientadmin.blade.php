<!DOCTYPE html>
<html>
<head>
    <title>New Client Notification</title>
</head>
<body>
    <h1>New Client Added</h1>
    <p>A new client has been added:</p>
    <p>Name: {{ $client->first_name }} {{ $client->last_name }}</p>
    <p>Email: {{ $client->email }}</p>
</body>
</html>
