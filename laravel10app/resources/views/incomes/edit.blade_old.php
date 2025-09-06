<!DOCTYPE html>
<html>

<head>
    <title>Edit Pemasukan</title>
</head>

<body>
    <h1>Edit Pemasukan</h1>
    <a href="{{ route('incomes.index') }}">⬅ Kembali</a>

    <form action="{{ route('incomes.update', $income->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kategori:</label>
        <select name="income_category_id" required>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $income->income_category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
            @endforeach
        </select><br><br>

        <label>Tanggal:</label>
        <input type="date" name="date" value="{{ $income->date }}" required><br><br>

        <label>Jumlah:</label>
        <input type="number" name="amount" value="{{ $income->amount }}" required><br><br>

        <label>Deskripsi:</label>
        <textarea name="description">{{ $income->description }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>