<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
        <form action="{{ route("register.store") }}" method="post">
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
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Digite seu email..." required> <br>
            </div>
            <div class="form-group">
                <label for="firstName">Primeiro Nome</label>
                <input class="form-control" type="text" name="firstName" placeholder="Digite seu primeiro nome..." required> <br>
            </div>
            <div class="form-group">
                <label for="lastName">Último Nome</label>
                <input class="form-control" type="text" name="lastName" placeholder="Digite seu último nome..." required> <br>
            </div>
            <div class="form-group">
                <label for="birthDate">Data de Nascimento</label>
                <input class="form-control" type="date" name="birthDate" required>
            </div>
            <div class="form-group">
                <br>
                <label for="gender">Gênero</label><br>
                <input type="radio" name="gender" value="M"> M <br>
                <input type="radio" name="gender" value="M"> F <br>
                <br>
            </div>
            <div class="form-group">
                <label for="phone">Celular</label>
                <input class="form-control" type="text" name="phone" placeholder="Digite seu telefone..."> <br>
            </div>
            <div class="form-group">
                <label for="address">Endereço</label>
                <input class="form-control" type="text" name="address" placeholder="Digite seu endereço..."> <br>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>
        <p>
            Já possui cadastro? <a href="{{ route("login") }}">Logue no sistema</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>