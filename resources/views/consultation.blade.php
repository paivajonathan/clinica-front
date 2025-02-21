<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
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
    <form action="{{ route("consultation.store") }}" method="post">
        @csrf
        @method("post")
        <input type="date" name="date"> <br>
        <input type="time" name="time"> <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>