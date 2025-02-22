<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
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
    <div class="container py-3">
        <h1>{{ $patient['full_name'] }}</h1>
        <form action="{{ route("attendance.store") }}" method="post">
            @csrf
            @method("post")
            <div class="form-group">
                <label for="observations">Observações</label>
                <textarea class="form-control" name="observations" placeholder="Digite o que foi definido no atendimento da consulta, como remédios preescritos ou exames..." required></textarea>
            </div>
            <input type="hidden" name="consultationId" value="{{ $consultation['id'] }}" required>
            <input class="my-3 btn btn-primary" type="submit" value="Enviar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>