<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                        <a class="nav-link active" aria-current="page" href="{{ route("dashboard") }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("consultation.doctor.history") }}">Histórico</a>
                    </li>
                </ul>
                <a class="btn btn-outline-danger" href="{{ route("login.destroy") }}">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container py-3">
        <h2>Consultas pendentes</h2>
        <div class="row">
            @forelse($pendingConsultations as $pendingConsultation)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pendingConsultation["patient_full_name"] }}</h5>
                            <h5 class="card-subtitle mb-2 text-muted">
                                {{ $pendingConsultation['date'] }}, às {{ $pendingConsultation['time'] }}
                            </h5>
                            <p class="card-text">
                                {{ $pendingConsultation["status"] }}
                            </p>
                            <a class="btn btn-primary"
                                href="{{ route("attendance", ["patientId" => $pendingConsultation["patient_id"], "consultationId" => $pendingConsultation["id"]]) }}">Cadastrar
                                atendimento</a>
                        </div>
                    </div>
                </div>
            @empty
                <div>Não há consultas pendentes</div>
            @endforelse
            </d>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>