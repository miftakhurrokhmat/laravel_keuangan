<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengeluaran</title>
</head>
<body>
    <h1>Daftar Pengeluaran</h1>
    <a href="{{ route('dashboard') }}">⬅ Kembali ke Dashboard</a>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->category->name }}</td>
                <td>{{ $expense->description }}</td>
                <td>Rp {{ number_format($expense->amount, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
