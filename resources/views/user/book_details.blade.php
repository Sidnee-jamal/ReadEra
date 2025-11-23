@extends('layouts.app')
@section('title',$book->title)

@section('content')

<div class="row">
    <div class="col-md-4">
        <img src="{{ asset('uploads/covers/'.$book->cover_image) }}" class="img-fluid">
    </div>

    <div class="col-md-8">
        <h2>{{ $book->title }}</h2>
        <p class="text-muted">{{ $book->author }}</p>

        @if($book->is_premium)
            <span class="badge bg-warning text-dark mb-2">Premium Book</span>
        @endif

        <p>{{ $book->description }}</p>

        @if(!$book->is_premium)
            <a href="{{ asset('uploads/books/'.$book->file_path) }}" class="btn btn-success">Download</a>
        @endif
    </div>
</div>

@endsection
