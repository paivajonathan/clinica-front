<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color:red">
                    {{ $error }}
                </p>
            @endforeach

        @endif
    </div>
    <form action="{{ route("login.store") }}" method="post">
        @csrf
        @method("post")
        <input type="text" name="username" placeholder="Digite seu usuário..."> <br>
        <input type="password" name="password" placeholder="Digite sua senha..."> <br>
        <input type="submit" value="Enviar">
    </form>
    <p>
        Ainda não possui cadastro? <a href="{{ route("register") }}">Cadastrar-se</a>
    </p>
</body>

</html>