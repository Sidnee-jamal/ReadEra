@extends('layouts.admin')
@section('title','Genres')

@section('content')

<a href="/admin/genres/create" class="btn btn-success mb-3">
    <i class="bi bi-plus"></i> Add Genre
</a>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th width="150">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($genres as $genre)
        <tr>
            <td>{{ $genre->name }}</td>
            <td>
                <a href="/admin/genres/edit/{{ $genre->id }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="/admin/genres/delete/{{ $genre->id }}" 
                   onclick="return confirm('Delete this genre?')"
                   class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
