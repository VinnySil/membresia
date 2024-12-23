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
    <form action="{{ route('users.index')}}" method="GET">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="{{ old('full_name', isset($filters['full_name']) ? $filters['full_name'] : null) }}"><br>
        <label for="nick">Nick:</label>
        <input type="text" name="nick" value="{{ old('nick', isset($filters['nick']) ? $filters['nick'] : null) }}"><br>
        <label for="rol">Rol:</label>
        <select name="rol_id">
            <option value="">Seleccione un rol</option>
            @foreach ($rols as $rol)
                <option value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
        </select><br>
        <button type="submit">Buscar</button>
    </form>

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
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>        
    </table>
    {{$users->links()}}
</body>
</html>