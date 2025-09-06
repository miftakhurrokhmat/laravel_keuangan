@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required
                value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required
                value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label>New Password (kosongkan kalau tidak ganti)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        {{-- ✅ Info role (read-only) --}}
        <div class="mb-3">
            <label>Role</label>
            <input type="text" class="form-control" value="{{ ucfirst($user->role) }}" disabled>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection