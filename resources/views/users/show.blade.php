<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos del usuario</title>
</head>
<body>
    
    <h1>Datos del usuario {{$user->nick}}</h1>
    <h1>rol: {{$user->rol->name}}</h1>
</body>
</html>