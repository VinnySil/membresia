<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar rol</title>
</head>
<body>
    <h1>Rol: {{$rol->name}}</h1>
    <h3>Permisos:</h3>
    <p>
    @foreach ($permissions as $permission)
        {{$permission->action}}, 
    @endforeach
    </p>
</body>
</html>