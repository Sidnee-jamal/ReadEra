@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard">

    <h2>Admin Dashboard</h2>

    <div class="dashboard-grid">

        <div class="card">
            <h3>Total Books</h3>
            <p>{{ $books }}</p>
        </div>

        <div class="card">
            <h3>Total Genres</h3>
            <p>{{ $genres }}</p>
        </div>

        <div class="card">
            <h3>Total Users</h3>
            <p>{{ $users }}</p>
        </div>

        <div class="card">
            <h3>Total Admins</h3>
            <p>{{ $admins }}</p>
        </div>

    </div>

</div>

@endsection
