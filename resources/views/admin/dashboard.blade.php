@extends('layouts.admin')
@section('title','Dashboard')

@section('content')

<div class="row g-3">

    <div class="col-md-4">
        <div class="card shadow-sm border-0 p-4">
            <h4>Total Books</h4>
            <p class="fs-1 fw-bold">{{ $bookCount }}</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0 p-4">
            <h4>Total Genres</h4>
            <p class="fs-1 fw-bold">{{ $genreCount }}</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0 p-4">
            <h4>Total Users</h4>
            <p class="fs-1 fw-bold">{{ $userCount }}</p>
        </div>
    </div>

</div>

@endsection
