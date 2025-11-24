@extends('layouts.admin')
@section('title','Users')

@section('content')

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>

            <td>
                @if($user->role === 'admin')
                    <span class="badge bg-danger">Admin</span>
                @else
                    <span class="badge bg-secondary">User</span>
                @endif
            </td>

            <td>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
