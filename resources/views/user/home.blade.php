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

<h2 class="mt-5">Genres</h2>

<div class="list-group">
@foreach($genres as $genre)
    <a href="/genres/{{ $genre->id }}" class="list-group-item list-group-item-action">
        {{ $genre->name }}
    </a>
@endforeach
</div>

@endsection
