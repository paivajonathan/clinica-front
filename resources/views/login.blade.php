<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container p-5">
        <form action="{{ route("login.store") }}" method="post">
            @csrf
            @method("post")
            <div class="form-group">
                <label for="username">Usuário</label>
                <input class="form-control" type="text" name="username" placeholder="Digite seu usuário..." required> <br>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input class="form-control" type="password" name="password" placeholder="Digite sua senha..." required> <br>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>
        <p>
            Ainda não possui cadastro? <a href="{{ route("register") }}">Cadastrar-se</a>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>