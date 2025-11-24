@extends('layouts.app')
@section('title', 'Read: ' . $book->title)

@section('content')
<h2 class="mb-4">{{ $book->title }}</h2>
<p class="text-muted">{{ $book->author }}</p>
<div class="mb-4">
    <iframe src="{{ $pdfUrl }}" width="100%" height="700px" style="border:1px solid #ccc; border-radius:8px;" allowfullscreen></iframe>
</div>
<a href="{{ url('/books/' . $book->id) }}" class="btn btn-outline-secondary">Back to Details</a>
@endsection
