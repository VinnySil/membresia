<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
</head>
<body>
    <h1>Cuenta de {{$user->nick}}</h1>

    <form action="{{ route('account.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}"><br>
        <label for="nick">Nick:</label>
        <input type="text" name="nick" value="{{ old('nick', $user->nick) }}"><br>
        <label for="nif">NIF:</label>
        <input type="text" name="nif" value="{{ old('nif', $user->nif) }}"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}"><br>
        {{-- <label for="password">Password:</label>
        <input type="password" name="password" value="{{ old('password', $user->password) }}"><br> --}}
        <label for="born_date">Born date:</label>
        <input type="date" name="born_date" value="{{ old('born_date', $user->born_date) }}"><br>
        
        <button type="submit">Editar</button>
    </form>

    <form action="{{ route('account.destroy', $user) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>