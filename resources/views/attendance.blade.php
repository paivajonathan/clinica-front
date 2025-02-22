<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
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
    <h1>{{ $patient['full_name'] }}</h1>
    <form action="{{ route("attendance.store") }}" method="post">
        @csrf
        @method("post")
        <textarea name="observations" required></textarea>
        <input type="hidden" name="consultationId" value="{{ $consultation['id'] }}" required>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>