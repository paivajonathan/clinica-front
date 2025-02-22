<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route("dashboard") }}">Idence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route("dashboard") }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route("consultation.history") }}">Histórico</a>
                    </li>
                </ul>
                <a class="btn btn-outline-danger" href="{{ route("login.destroy") }}">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container py-3">
        <h2>Histórico de Consultas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Data</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            @forelse($consultations as $consultation)
                <tr>
                    <th scope="row">{{ $consultation["id"] }}</th>
                    <td>{{ $consultation["doctor_full_name"] }}</td>
                    <td>{{ $consultation["date"] }}</td>
                    <td>{{ $consultation["time"] }}</td>
                    <td>{{ $consultation["status"] }}</td>
                </tr>
            @empty
                <div>Não há histórico disponível</div>
            @endforelse
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>