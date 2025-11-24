@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="auth-container">

    <h2>Login</h2>

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button class="btn btn-green">Login</button>

        <p>
            Don't have an account?
            <a href="/register">Create one</a>
        </p>

    </form>

</div>

@endsection
