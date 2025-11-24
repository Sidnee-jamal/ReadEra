<div class="card shadow-sm">
    @php
        $coverPath = public_path('storage/' . $book->cover_image);
        $hasCover = !empty($book->cover_image) && file_exists($coverPath);
    @endphp
    <img src="{{ $hasCover ? asset('storage/' . $book->cover_image) : asset('images/default-cover.png') }}" class="card-img-top" alt="Cover">

    <div class="card-body">
        <h5 class="card-title">{{ $book->title }}</h5>
        <p class="text-muted">{{ $book->author }}</p>

        @if($book->is_premium)
            <span class="badge bg-warning text-dark mb-2">Premium</span>
        @endif

        <a href="/books/{{ $book->id }}" class="btn btn-primary w-100">View</a>
    </div>
</div>
