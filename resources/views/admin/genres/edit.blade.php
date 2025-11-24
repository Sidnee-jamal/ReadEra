@extends('layouts.admin')
@section('title','Edit Genre')

@section('content')

<form method="POST">
@csrf

<label class="form-label">Genre Name</label>
<input type="text" name="name" class="form-control mb-3" value="{{ $genre->name }}" required>

<button class="btn btn-primary px-5">Update Genre</button>

</form>

@endsection
