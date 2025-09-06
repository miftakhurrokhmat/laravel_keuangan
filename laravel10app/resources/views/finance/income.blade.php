{{-- resources/views/incomes/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Pemasukan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">📥 Daftar Pemasukan</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
        ⬅ Kembali ke Dashboard
    </a>
</div>

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
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">
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