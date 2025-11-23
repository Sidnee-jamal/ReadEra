@extends('layouts.app')
@section('title','Search Results')

@section('content')

<h3 class="mb-4">Results for: <strong>{{ $query }}</strong></h3>

<div class="row g-3">
@foreach($books as $book)
    <div class="col-md-3">
        @include('components.book-card', ['book' => $book])
    </div>
@endforeach
</div>

@endsection
