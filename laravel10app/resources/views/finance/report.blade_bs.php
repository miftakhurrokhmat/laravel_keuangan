<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">💰 Keuangan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('general/incomes') }}">Pemasukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('general/expenses') }}">Pengeluaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('general/report') }}">Report</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">📑 Laporan Keuangan</h1>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                ⬅ Kembali ke Dashboard
            </a>
        </div>

        <div class="row g-4">
            <!-- Total Pemasukan -->
            <div class="col-md-4">
                <div class="card shadow-sm border-success">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">Total Pemasukan</h5>
                        <p class="fs-4 fw-bold text-success">
                            Rp {{ number_format($totalIncome, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Total Pengeluaran -->
            <div class="col-md-4">
                <div class="card shadow-sm border-danger">
                    <div class="card-body text-center">
                        <h5 class="card-title text-danger">Total Pengeluaran</h5>
                        <p class="fs-4 fw-bold text-danger">
                            Rp {{ number_format($totalExpense, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Saldo -->
            <div class="col-md-4">
                <div class="card shadow-sm border-primary">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Saldo</h5>
                        <p class="fs-4 fw-bold text-primary">
                            Rp {{ number_format($balance, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
