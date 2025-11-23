@extends('layouts.admin')
@section('title','Create Genre')

@section('content')

<form method="POST">
@csrf

<label class="form-label">Genre Name</label>
<input type="text" name="name" class="form-control mb-3" required>

<button class="btn btn-success px-5">Add Genre</button>

</form>

@endsection
