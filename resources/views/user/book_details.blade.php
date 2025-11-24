@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@extends('layouts.app')
@section('title',$book->title)

@section('content')

<div class="row">
    <div class="col-md-4">
        @php
            $coverPath = public_path('storage/' . $book->cover_image);
            $hasCover = !empty($book->cover_image) && file_exists($coverPath);
        @endphp
        <img src="{{ $hasCover ? asset('storage/' . $book->cover_image) : asset('images/default-cover.png') }}" class="img-fluid">
    </div>

    <div class="col-md-8">
        <h2>{{ $book->title }}</h2>
        <p class="text-muted">{{ $book->author }}</p>

        @if($book->is_premium)
            <span class="badge bg-warning text-dark mb-2">Premium Book</span>
        @endif

        <p>{{ $book->description }}</p>

        @if(!$book->is_premium)
            <a href="{{ route('books.read', $book->id) }}" class="btn btn-primary me-2">Read Online</a>
            <a href="{{ asset('storage/' . $book->file_path) }}" download class="btn btn-success">Download</a>
        @endif
    </div>
</div>

@endsection
