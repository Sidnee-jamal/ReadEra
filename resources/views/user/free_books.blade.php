@extends('layouts.app')
@section('title','Free Books')

@section('content')
<h2 class="mb-4">Free Books</h2>

<div class="row g-3">
@foreach($books as $book)
    <div class="col-md-3">
        @include('components.book-card', ['book' => $book])
    </div>
@endforeach
</div>
@endsection
