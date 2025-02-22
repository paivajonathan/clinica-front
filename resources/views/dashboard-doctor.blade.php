<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <a href="{{ route("login.destroy") }}">Logout</a>

    <h1>Dashboard Doctor</h1>
    <h2>Pending Consultations</h2>
    <ul>
        @forelse($pendingConsultations as $pendingConsultation)
            <div>
                {{ $pendingConsultation["patient_full_name"] }} - {{ $pendingConsultation['date'] }} - {{ $pendingConsultation['time'] }} - {{ $pendingConsultation["status"] }}
                <a href="{{ route("attendance", ["patientId" => $pendingConsultation["patient_id"], "consultationId" => $pendingConsultation["id"]]) }}">Cadastrar atendimento</a>
            </div>
        @empty
            <div>No consultations available</div>
        @endforelse
    </ul>

    <a href="{{ route("consultation.doctor.history") }}">Histórico</a>
</body>
</html>