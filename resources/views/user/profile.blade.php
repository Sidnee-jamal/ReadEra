@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container auth-container">
    <h2>Your Profile</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Role:</strong> {{ Auth::user()->role === 'admin' ? 'Admin' : 'User' }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
