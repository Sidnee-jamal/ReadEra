<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home', [
            'featured' => Book::latest()->take(8)->get(),
            'genres' => Genre::all(),
        ]);
    }
}
