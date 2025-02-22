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
                {{ $doctor['full_name'] }} - {{ $doctor['specialty'] }}
                <a href="{{ route('consultation', ['doctorId' => $doctor['id']])  }}">Marcar Consulta</a>
            </li>
        @empty
            <li>No doctors available</li>
        @endforelse
    </ul>

    <h2>Pending Consultations</h2>
    <ul>
        @forelse($pendingConsultations as $pendingConsultation)
            <div>
                {{ $pendingConsultation['date'] }} - {{ $pendingConsultation['time'] }} - {{ $pendingConsultation["status"] }}
                <form action="{{ route("consultation.cancel", ["consultationId" => $pendingConsultation["id"]]) }}" method="post">
                    @csrf
                    @method("put")
                    <input type="submit" value="Cancelar Consulta" onclick="confirm('Certeza que deseja cancelar?')">
                </form>
            </div>
        @empty
            <div>No consultations available</div>
        @endforelse
    </ul>

    <a href="{{ route("consultation.history") }}">Histórico</a>
</body>
</html>