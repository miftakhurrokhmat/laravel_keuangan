<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemasukan</title>
</head>
<body>
    <h1>Daftar Pemasukan</h1>
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
            @foreach($incomes as $income)
            <tr>
                <td>{{ $income->date }}</td>
                <td>{{ $income->category->name }}</td>
                <td>{{ $income->description }}</td>
                <td>Rp {{ number_format($income->amount, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
