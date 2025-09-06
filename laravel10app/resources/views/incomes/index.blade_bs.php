<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemasukan</title>
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
            <h1 class="h3">📥 Daftar Pemasukan</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary me-2">⬅ Kembali</a>
                <a href="{{ route('incomes.create') }}" class="btn btn-success">➕ Tambah Pemasukan</a>
            </div>
        </div>

        <!-- Alert Sukses -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col" class="text-end">Jumlah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($incomes as $income)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($income->date)->translatedFormat('d F Y') }}</td>
                                <td>{{ $income->category->name }}</td>
                                <td>{{ $income->description }}</td>
                                <td class="text-end text-success fw-semibold">
                                    Rp {{ number_format($income->amount, 0, ',', '.') }}
                                </td>
                                <td>
                                    <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-sm btn-warning">✏ Edit</a>
                                    <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                            🗑 Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    Belum ada pemasukan
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>