@extends('layouts.app')
@section('title','Home')

@section('content')

<h2 class="mb-4">Featured Books</h2>

<div class="row g-3">
@foreach($featured as $book)
    <div class="col-md-3">
        @include('components.book-card', ['book' => $book])
    </div>
@endforeach
</div>

@endsection
