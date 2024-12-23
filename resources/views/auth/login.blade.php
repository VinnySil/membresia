<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Logueate para acceder a la página</h1>
    @error('error')
        <div>{{ $message }}</div>
    @enderror
    <form action="{{ route('post.login') }}" method="POST">
        @csrf
        <label for="nick">Nick:</label>
        <input type="text" name="nick" value="{{ old('nick') }}"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" value="{{ old('password') }}"><br>
        <label for="remember">Recordarme</label>
        <input type="checkbox" name="remember"><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>