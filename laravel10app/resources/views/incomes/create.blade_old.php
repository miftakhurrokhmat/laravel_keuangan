<!DOCTYPE html>
<html>

<head>
    <title>Tambah Pemasukan</title>
</head>

<body>
    <h1>Tambah Pemasukan</h1>
    <a href="{{ route('incomes.index') }}">⬅ Kembali</a>

    <form action="{{ route('incomes.store') }}" method="POST">
        @csrf
        <label>Kategori:</label>
        <select name="income_category_id" required>
            <option value="">-- Pilih --</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select><br><br>

        <label>Tanggal:</label>
        <input type="date" name="date" required><br><br>

        <label>Jumlah:</label>
        <input type="number" name="amount" required><br><br>

        <label>Deskripsi:</label>
        <textarea name="description"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>