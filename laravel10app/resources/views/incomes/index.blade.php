@extends('layouts.app')

@section('title', 'Daftar Pemasukan')

@section('content')
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
@endsection
