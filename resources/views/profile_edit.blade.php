@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container auth-container">
    <h2>Edit Profile</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', Auth::user()->username) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password (optional)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ route('profile') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
