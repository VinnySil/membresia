<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar permiso</title>
</head>
<body>
    <h1>Modificar permiso</h1>
    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="action">Action:</label>
        <input type="text" name="action" value="{{ old('action', $permission->action) }}"><br>
        <button type="submit">Editar</button>
    </form>
</body>
</html>