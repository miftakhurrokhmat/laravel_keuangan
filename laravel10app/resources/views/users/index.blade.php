@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add User</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            {{-- ✅ Tambahan kolom Role --}}
            <th>Role</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            {{-- ✅ Tampilkan role --}}
            <td>{{ ucfirst($user->role) }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete user?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $users->links() }}
</div>
@endsection