<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear nuevo usuario</title>
</head>
<body>
    <h1>Crear un nuevo usuario</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="{{ old('full_name') }}"><br>
        <label for="nick">Nick:</label>
        <input type="text" name="nick" value="{{ old('nick') }}"><br>
        <label for="rol">Rol:</label>
        <select name="rol_id">
            @foreach ($rols as $rol)
                <option value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
        </select><br>
        <label for="nif">NIF:</label>
        <input type="text" name="nif" value="{{ old('nif') }}"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="{{ old('password') }}"><br>
        <label for="born_date">Born date:</label>
        <input type="date" name="born_date" value="{{ old('born_date') }}"><br>
        
        <button type="submit">Crear</button>
    </form>
</body>
</html>