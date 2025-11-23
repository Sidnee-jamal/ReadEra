@extends('layouts.app')
@section('title','Premium Books')

@section('content')

<h2 class="mb-4">Premium Books</h2>

<p class="alert alert-warning">Premium books are locked for now.</p>

<div class="row g-3">
@foreach($books as $book)
    <div class="col-md-3">
        @include('components.book-card', ['book' => $book])
    </div>
@endforeach
</div>

@endsection
