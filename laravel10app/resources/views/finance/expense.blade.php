{{-- resources/views/expenses/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Pengeluaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">💸 Daftar Pengeluaran</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
        ⬅ Kembali ke Dashboard
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-danger">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col" class="text-end">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($expense->date)->translatedFormat('d F Y') }}</td>
                        <td>{{ $expense->category->name }}</td>
                        <td>{{ $expense->description }}</td>
                        <td class="text-end text-danger fw-semibold">
                            Rp {{ number_format($expense->amount, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">
                            Belum ada pengeluaran
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection