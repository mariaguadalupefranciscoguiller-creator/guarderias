<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>LOGIN FUNCIONANDO</h1>

<form method="POST" action="/login">
    @csrf

    <label>Correo:</label><br>
    <input type="email" name="email"><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Entrar</button>
</form>

</body>
</html>