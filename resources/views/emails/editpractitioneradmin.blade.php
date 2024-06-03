<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Service</title>
</head>
<body>
    <h1>Hello, {{ $practitioner->first_name }}!</h1>
    <p>Here are new informations about your account.</p>
    <p>Here are details:</p>
    <p>Name: {{ $practitioner->first_name }} {{ $practitioner->last_name }}</p>
    <p>Email: {{ $practitioner->email }}</p>
    <p>Practice: {{ $practice->name }}</p>
    <p>Practice Email: {{ $practice->email }}</p>
    <p>Feel free to reach out to us if you have any questions.</p>
</body>
</html>
