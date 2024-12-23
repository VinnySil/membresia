<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index permisos</title>
</head>
<body>
    <h1>Index de permisos</h1>

    <form action="{{ route('permissions.index')}}" method="GET">
        <label for="action">Action: </label>
        <input type="text" name="action" value="{{ old('action',$filter ? $filter : null) }}"><br>
        <button type="submit">Buscar</button>
    </form>


    <a href="{{ route('permissions.create') }}">Crear nuevo permiso</a>
    <table>
        <thead>
            <tr>
                <th>Permiso/Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->action }}</td>
                    <td>
                        <a href="{{ route('permissions.show', $permission) }}">Ver</a>
                        <a href="{{ route('permissions.edit', $permission) }}">Editar</a>
                        <form action="{{ route('permissions.destroy', $permission) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>        
    </table>
    {{$permissions->links()}}
</body>
</html>