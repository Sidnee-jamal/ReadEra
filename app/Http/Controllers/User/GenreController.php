<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class GenreController extends Controller
{
    public function show($id)
    {
        $genre = Genre::with('books')->findOrFail($id);

        return view('user.genres', [
            'genre' => $genre,
            'books' => $genre->books
        ]);
    }
}
