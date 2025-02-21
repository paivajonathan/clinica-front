<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Patient</title>
</head>
<body>
    <h1>Welcome to the Patient Dashboard</h1>

    <h2>Available Doctors</h2>
    <ul>
        @forelse($doctors as $doctor)
            <li>
                {{ $doctor['user']['first_name'] }} - {{ $doctor['doctor']['specialty'] }}
                <a href="{{ route('consultation', ['doctorId' => $doctor['doctor']['id']])  }}">Marcar Consulta</a>
            </li>
        @empty
            <li>No doctors available</li>
        @endforelse
    </ul>

</body>
</html>