<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear permiso</title>
</head>
<body>
    <h1>Crear un nuevo permiso</h1>
    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <label for="action">Action:</label>
        <input type="text" name="action" value="{{ old('action') }}"><br>
        
        <button type="submit">Crear</button>
    </form>
</body>
</html>