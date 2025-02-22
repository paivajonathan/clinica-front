<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
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
        <h1>{{ $doctor['full_name'] }}</h1>
        <form action="{{ route("consultation.store") }}" method="post">
            @csrf
            @method("post")
            <div class="form-group">
                <label for="date">Data</label>
                <input class="form-control" type="date" name="date" required> <br>
            </div>
            <div class="form-group">
                <label for="time">Horário</label>
                <input class="form-control" type="time" name="time" required> <br>
            </div>
            <div class="form-group">
                <label for="observations">Observações</label>
                <textarea class="form-control" name="observations" required placeholder="Digite o que está sentindo..."></textarea>
            </div>
            <input type="hidden" name="doctorId" value="{{ $doctor['id'] }}">
            <div class="my-3">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>