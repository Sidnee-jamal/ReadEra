@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="auth-container">

    <h2>Create an Account</h2>

    <form method="POST" action="/register">
        @csrf


        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button class="btn btn-green">Register</button>

        <p>
            Already have an account?
            <a href="/login">Login</a>
        </p>
    </form>

</div>

@endsection
