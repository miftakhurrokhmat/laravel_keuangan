<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemasukan</title>
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
                        <a class="nav-link active" href="{{ url('general/incomes') }}">Pemasukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('general/expenses') }}">Pengeluaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('general/report') }}">Report</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">➕ Tambah Pemasukan</h1>
            <a href="{{ route('incomes.index') }}" class="btn btn-outline-secondary">
                ⬅ Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('incomes.store') }}" method="POST">
                    @csrf

                    <!-- Kategori -->
                    <div class="mb-3">
                        <label for="income_category_id" class="form-label">Kategori</label>
                        <select name="income_category_id" id="income_category_id" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>

                    <!-- Jumlah -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-success w-100">💾 Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>