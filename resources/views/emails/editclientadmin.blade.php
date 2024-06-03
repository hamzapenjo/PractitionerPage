<!DOCTYPE html>
<html>
<head>
    <title>New Client Notification</title>
</head>
<body>
    <h1>Existing Client Updated</h1>
    <p>The existing client has been edited:</p>
    <p>Name: {{ $client->first_name }} {{ $client->last_name }}</p>
    <p>Email: {{ $client->email }}</p>
</body>
</html>
