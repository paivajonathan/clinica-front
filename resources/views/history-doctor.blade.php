<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Patient</title>
</head>
<body>
    <a href="{{ route("dashboard") }}">Go back to main page</a>
    <h1>Welcome to the Patient History</h1>
    <h2>Consultations</h2>
    <ul>
        @forelse($consultations as $consultation)
            <div>
                {{ $consultation["patient_full_name"] }} - {{ $consultation['date'] }} - {{ $consultation['time'] }} - {{ $consultation["status"] }}
            </div>
        @empty
            <div>No history available</div>
        @endforelse
    </ul>
</body>
</html>