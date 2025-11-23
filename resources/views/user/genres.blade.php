@extends('layouts.app')
@section('title', $genre->name)

@section('content')

<h2 class="mb-4">{{ $genre->name }}</h2>

<div class="row g-3">
@foreach($books as $book)
    <div class="col-md-3">
        @include('components.book-card', ['book' => $book])
    </div>
@endforeach
</div>

@endsection
