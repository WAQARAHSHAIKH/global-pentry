@extends('layout.admin')

@section('title', 'Manage Users')

@section('content')

<div class="section-box mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">All Registered Users</h4>
        <a href="{{ route('users.create') }}" class="add-btn">+ Add New User</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Registered At</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td class="text-end">
                        <a href="{{ route('users.edit', $user) }}" class="text-primary me-2">Edit</a>

                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link text-danger p-0 m-0">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $users->links() }}
    </div>
</div>

@endsection
