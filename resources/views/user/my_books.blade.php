@extends('layouts.app')
@section('title','My Books')

@section('content')
<h2 class="mb-4">My Books</h2>
@if($books->isEmpty())
	<p>You haven't downloaded any books yet.</p>
@else
	<div class="row g-3">
		@foreach($books as $book)
			<div class="col-md-3">
				<div class="card shadow-sm">
					<img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="Cover">
					<div class="card-body">
						<h5 class="card-title">{{ $book->title }}</h5>
						<p class="text-muted">{{ $book->author }}</p>
						<a href="{{ route('books.read', $book->id) }}" class="btn btn-primary w-100 mb-2">Read Online</a>
						<form action="{{ route('books.download', $book->id) }}" method="POST" target="_blank">
							@csrf
							<button type="submit" class="btn btn-success w-100">Download</button>
						</form>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endif
@endsection
