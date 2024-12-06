<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear nuevo usuario</title>
</head>
<body>
    <h1>Crear un nuevo usuario</h1>

    <form action="{{ route('users.store') }}">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname"><br>
        <label for="nick">Nick:</label>
        <input type="text" name="nick"><br>
        <label for="nif">NIF:</label>
        <input type="text" name="nif"><br>
        <label for="email">Email:</label>
        <input type="email" name="email"><br>
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>