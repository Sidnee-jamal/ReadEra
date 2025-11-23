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
                @if($user->role !== 'admin')
                <a href="/admin/users/promote/{{ $user->id }}"
                   class="btn btn-success btn-sm">Promote</a>
                @endif

                <a href="/admin/users/delete/{{ $user->id }}"
                   onclick="return confirm('Delete this user?')"
                   class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
