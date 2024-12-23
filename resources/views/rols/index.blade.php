<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index rols</title>
</head>
<body>
    <h1>Index de rols</h1>

    <form action="{{ route('rols.index')}}" method="GET">
        <label for="name">Name: </label>
        <input type="text" name="name" value="{{ old('name',$filter ? $filter : null) }}"><br>
        <button type="submit">Buscar</button>
    </form>

    <a href="{{ route('rols.create') }}">Crear nuevo permiso</a>
    <table>
        <thead>
            <tr>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rols as $rol)
                <tr>
                    <td>{{ $rol->name }}</td>
                    <td>
                        <a href="{{ route('rols.show', $rol) }}">Ver</a>
                        <a href="{{ route('rols.edit', $rol) }}">Editar</a>
                        <form action="{{ route('rols.destroy', $rol) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>        
    </table>
    {{$rols->links()}}
</body>
</html>