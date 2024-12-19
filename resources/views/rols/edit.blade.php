<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar rol</title>
</head>
<body>
    <h1>Modificar rol</h1>
    <form action="{{ route('rols.update', $rol) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">name:</label>
        <input type="text" name="name" value="{{ old('name', $rol->name) }}"><br>
        @foreach ($permissions as $permission)
            <label>{{$permission->action}}</label>
            <input type="checkbox" name='permissions[]' value={{$permission->id}} @checked(in_array($permission->id, $userPermissionsArray))><br>
        @endforeach
        <button type="submit">Editar</button>
    </form>
</body>
</html>