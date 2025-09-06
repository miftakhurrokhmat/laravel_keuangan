{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard Keuangan')

@section('content')
<h1 class="text-center mb-4">📊 Dashboard Keuangan</h1>

{{-- Saldo --}}
<div class="alert alert-success text-center fs-4 fw-bold">
    Saldo: Rp {{ number_format($balance, 0, ',', '.') }}
</div>

<div class="row g-4">
    {{-- Pemasukan --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Pemasukan Terbaru</h5>
                <a href="{{ route('incomes.index') }}" class="btn btn-sm btn-primary">+ Tambah</a>
            </div>
            <ul class="list-group list-group-flush">
                @forelse($incomes as $income)
                <li class="list-group-item">
                    <span class="fw-bold">{{ $income->formatted_date }}</span> - {{ $income->category->name }} :
                    <span class="text-success">Rp {{ number_format($income->amount, 0, ',', '.') }}</span>
                </li>
                @empty
                <li class="list-group-item text-muted text-center">Belum ada pemasukan</li>
                @endforelse
            </ul>
        </div>
    </div>

    {{-- Pengeluaran --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Pengeluaran Terbaru</h5>
            </div>
            <ul class="list-group list-group-flush">
                @forelse($expenses as $expense)
                <li class="list-group-item">
                    <span class="fw-bold">{{ \Carbon\Carbon::parse($expense->date)->translatedFormat('d F Y') }}</span> - {{ $expense->category->name }} :
                    <span class="text-danger">Rp {{ number_format($expense->amount, 0, ',', '.') }}</span>
                </li>
                @empty
                <li class="list-group-item text-muted text-center">Belum ada pengeluaran</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection