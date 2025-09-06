@extends('layouts.app')

@section('title', 'Laporan Keuangan')

@section('content')
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
@endsection