@extends('layouts.admin')
@section('title','Add Book')

@section('content')

<h2 class="mb-4">Add Book</h2>

<form method="POST" enctype="multipart/form-data">
    @csrf

    <label class="mt-2">Title</label>
    <input type="text" name="title" class="form-control">

    <label class="mt-2">Author</label>
    <input type="text" name="author" class="form-control">

    <label class="mt-2">Description</label>
    <textarea name="description" class="form-control"></textarea>

    <label class="mt-2">Cover Image</label>
    <input type="file" name="cover_image" class="form-control">

    <label class="mt-2">Book File (PDF)</label>
    <input type="file" name="file_path" class="form-control">

    <label class="mt-3">Premium?</label>
    <input type="checkbox" name="is_premium">

    <label class="mt-3">Genres</label>
    <select name="genres[]" class="form-control" multiple>
        @foreach($genres as $g)
            <option value="{{ $g->id }}">{{ $g->name }}</option>
        @endforeach
    </select>

    <button class="btn btn-primary mt-4">Submit</button>
</form>

@endsection
