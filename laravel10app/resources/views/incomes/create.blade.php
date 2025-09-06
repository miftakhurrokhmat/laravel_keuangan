@extends('layouts.app')

@section('title', 'Tambah Pemasukan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">➕ Tambah Pemasukan</h1>
    <a href="{{ route('incomes.index') }}" class="btn btn-outline-secondary">⬅ Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('incomes.store') }}" method="POST">
            @csrf

            <!-- Kategori -->
            <div class="mb-3">
                <label for="income_category_id" class="form-label">Kategori</label>
                <select name="income_category_id" id="income_category_id" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal -->
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <!-- Jumlah -->
            <div class="mb-3">
                <label for="amount" class="form-label">Jumlah</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-success w-100">💾 Simpan</button>
        </form>
    </div>
</div>
@endsection