@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-3">
            <label>New Password (kosongkan kalau tidak ganti)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        {{-- ✅ Tambahan field Role --}}
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                <option value="editor" {{ old('role', $user->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection