<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear rol</title>
</head>
<body>
    <h1>Crear un nuevo rol</h1>
    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rols.store') }}" method="POST">
        @csrf
        <label for="name">name:</label>
        <input type="text" name="name" value="{{ old('name') }}"><br>
        @foreach ($permissions as $permission)
            <label>{{$permission->action}}</label>
            <input type="checkbox" name='permissions[]' value={{$permission->id}}><br>
        @endforeach
        <button type="submit">Crear</button>
    </form>
</body>
</html>