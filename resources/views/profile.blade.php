@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Profile</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Role:</strong> {{ Auth::user()->is_admin ? 'Admin' : 'User' }}</p>
            <p><strong>Premium:</strong> {{ Auth::user()->is_premium ? 'Yes' : 'No' }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
