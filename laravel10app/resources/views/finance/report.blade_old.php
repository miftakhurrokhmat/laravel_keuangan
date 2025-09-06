<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan</title>
</head>
<body>
    <h1>Laporan Keuangan</h1>
    <a href="{{ route('dashboard') }}">⬅ Kembali ke Dashboard</a>

    <p>Total Pemasukan: Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
    <p>Total Pengeluaran: Rp {{ number_format($totalExpense, 0, ',', '.') }}</p>
    <p><strong>Saldo: Rp {{ number_format($balance, 0, ',', '.') }}</strong></p>
</body>
</html>
