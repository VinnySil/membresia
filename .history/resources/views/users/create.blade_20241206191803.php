<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Crear un nuevo usuario</h1>

    <form action="{{ route('users.store') }}">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname">
        <label for="nick">Nick:</label>
        <input type="text" name="nick">
        <label for="nif">NIF:</label>
        <input type="text" name="nif">
        <label for="email">email:</label>
        <input type="text" name="email">
        <label for="nif">NIF:</label>
        <input type="text" name="nif">
        
    </form>
</body>
</html>