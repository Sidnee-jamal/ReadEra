@extends('layouts.admin')
@section('title','Edit Book')

@section('content')

<form method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
    <div class="col-md-7">

        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control mb-3" value="{{ $book->title }}">

        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control mb-3" value="{{ $book->author }}">

        <label class="form-label">Description</label>
        <textarea name="description" class="form-control mb-3" rows="5">{{ $book->description }}</textarea>

        <label class="form-label">Genres</label>
        <select name="genres[]" class="form-control mb-3" multiple>
            @foreach($genres as $g)
                <option value="{{ $g->id }}"
                    {{ $book->genres->contains($g->id) ? 'selected' : '' }}>
                {{ $g->name }}
                </option>
            @endforeach
        </select>

        <label class="form-label">Premium Status</label>
        <div class="form-check mb-4">
            <input type="checkbox" name="is_premium" class="form-check-input"
                {{ $book->is_premium ? 'checked' : '' }}>
            <label class="form-check-label">Premium Book</label>
        </div>

        <button class="btn btn-primary px-5">Update Book</button>

    </div>

    <div class="col-md-5">

        <label class="form-label">Current Cover</label><br>
        <img src="{{ asset('storage/'.$book->cover_image) }}" width="150" class="mb-3 rounded shadow">

        <label class="form-label">Upload New Cover</label>
        <input type="file" name="cover_image" class="form-control mb-3">

        <label class="form-label">Replace Book File (PDF)</label>
        <input type="file" name="file_path" class="form-control">

    </div>
</div>

</form>

@endsection
