<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pemasukan</title>
</head>

<body>
    <h1>Daftar Pemasukan</h1>
    <a href="{{ route('dashboard') }}">⬅ Kembali ke Dashboard</a> |
    <a href="{{ route('incomes.create') }}">➕ Tambah Pemasukan</a>

    @if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incomes as $income)
            <tr>
                <td>{{ $income->date }}</td>
                <td>{{ $income->category->name }}</td>
                <td>{{ $income->description }}</td>
                <td>Rp {{ number_format($income->amount, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('incomes.edit', $income->id) }}">✏ Edit</a>
                    <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')">🗑 Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>