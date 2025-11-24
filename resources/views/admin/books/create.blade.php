@extends('layouts.admin')
@section('title','Add Book')

@section('content')

<form method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
    <div class="col-md-7">

        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control mb-3" required>

        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control mb-3" required>

        <label class="form-label">Description</label>
        <textarea name="description" class="form-control mb-3" rows="5"></textarea>

        <label class="form-label">Genres</label>
        <select name="genres[]" class="form-control mb-3" multiple required>
            @foreach($genres as $g)
                <option value="{{ $g->id }}">{{ $g->name }}</option>
            @endforeach
        </select>

        <label class="form-label">Premium Status</label>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_premium" id="premiumCheck">
            <label for="premiumCheck" class="form-check-label">Mark as Premium</label>
        </div>

        <button class="btn btn-primary px-5">Create Book</button>

    </div>

    <div class="col-md-5">

        <label class="form-label">Cover Image</label>
        <input type="file" name="cover_image" class="form-control mb-3" required>

        <label class="form-label">Book File (PDF)</label>
        <input type="file" name="file_path" class="form-control mb-3" required>

    </div>
</div>

</form>

@endsection
