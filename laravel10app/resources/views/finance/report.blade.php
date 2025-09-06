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

{{-- Chart --}}
<div class="card shadow-sm mt-5">
    <div class="card-body">
        <h5 class="card-title">📊 Grafik Pemasukan vs Pengeluaran (Per Bulan)</h5>
        <canvas id="financeChart" height="120"></canvas>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('financeChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                    label: 'Pemasukan',
                    data: @json($pemasukan),
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                },
                {
                    label: 'Pengeluaran',
                    data: @json($pengeluaran),
                    backgroundColor: 'rgba(255, 99, 132, 0.7)'
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let value = context.raw || 0;
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endpush