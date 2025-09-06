<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Keuangan</title>
</head>
<body>
    <h1>Dashboard Keuangan</h1>

    <h3>Saldo: Rp {{ number_format($balance, 0, ',', '.') }}</h3>

    <h3>Pemasukan Terbaru</h3>
    <a href="{{ route('incomes.index') }}">Tambah Pemasukan</a>
    <ul>
        @foreach($incomes as $income)
            <li>{{ $income->date }} - {{ $income->category->name }} : Rp {{ number_format($income->amount, 0, ',', '.') }}</li>
        @endforeach
    </ul>

    <h3>Pengeluaran Terbaru</h3>
    <ul>
        @foreach($expenses as $expense)
            <li>{{ $expense->date }} - {{ $expense->category->name }} : Rp {{ number_format($expense->amount, 0, ',', '.') }}</li>
        @endforeach
    </ul>
</body>
</html>