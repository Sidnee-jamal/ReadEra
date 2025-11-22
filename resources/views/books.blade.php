@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Book Listing</h2>
    <ul class="list-group">
        @foreach($books as $book)
            <li class="list-group-item">{{ $book['title'] }}</li>
        @endforeach
    </ul>
</div>
@endsection
