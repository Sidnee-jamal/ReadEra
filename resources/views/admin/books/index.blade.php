@extends('layouts.admin')
@section('title', 'Books')

@section('content')

<a href="/admin/books/create" class="btn btn-success mb-3">
    <i class="bi bi-plus-lg"></i> Add New Book
</a>

<table class="table table-bordered table-hover align-middle">

    <thead class="table-dark">
        <tr>
            <th width="80">Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Premium</th>
            <th>Genres</th>
            <th width="150">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($books as $book)
        <tr>
            <td>
                <img src="{{ asset('storage/' . $book->cover_image) }}"
                     width="60" class="rounded shadow-sm">
            </td>

            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>

            <td>
                @if($book->is_premium)
                    <span class="badge bg-warning text-dark">Premium</span>
                @else
                    <span class="badge bg-success">Free</span>
                @endif
            </td>

            <td>
                @foreach($book->genres as $g)
                    <span class="badge bg-secondary">{{ $g->name }}</span>
                @endforeach
            </td>

            <td>
                <a href="/admin/books/edit/{{ $book->id }}" class="btn btn-primary btn-sm">
                    Edit
                </a>

                <a href="/admin/books/delete/{{ $book->id }}"
                   onclick="return confirm('Delete this book?')"
                   class="btn btn-danger btn-sm">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection
