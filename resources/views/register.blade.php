<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
    <form action="{{ route("register.store") }}" method="post">
        @csrf
        @method("post")
        
        <input type="text" name="username" placeholder="Digite seu usuário..."> <br>
        <input type="password" name="password" placeholder="Digite sua senha..."> <br>
        <input type="email" name="email" placeholder="Digite seu email..."> <br>
        <input type="text" name="firstName" placeholder="Digite seu primeiro nome..."> <br>
        <input type="text" name="lastName" placeholder="Digite seu último nome..."> <br>
        
        <input type="date" name="birthDate"> <br>
        <input type="radio" name="gender" value="M"> M <input type="radio" name="gender" value="M"> F <br>
        <input type="text" name="phone" placeholder="Digite seu telefone..."> <br>
        <input type="text" name="address" placeholder="Digite seu endereço..."> <br>
        
        <input type="submit" value="Enviar">
    </form>
    <p>
        Já possui cadastro? <a href="{{ route("login") }}">Logue no sistema</a>
    </p>

</body>

</html>