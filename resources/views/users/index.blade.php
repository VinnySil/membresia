<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="{{ route('users.create') }}">Crear nuevo usuario</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>NIF</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->nick }}</td>
                    <td>{{ $user->nif }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user) }}">Ver</a>
                        <a href="{{ route('users.edit', $user) }}">Editar</a>
                        <a href="{{ route('users.destroy', $user) }}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>        
    </table>
</body>
</html>