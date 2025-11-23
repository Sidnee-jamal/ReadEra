<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function freeBooks()
    {
        $books = Book::where('is_premium', false)->get();
        return view('user.free_books', compact('books'));
    }

    public function premiumBooks()
    {
        $books = Book::where('is_premium', true)->get();
        return view('user.premium_books', compact('books'));
    }

    public function details($id)
    {
        $book = Book::findOrFail($id);
        return view('user.book_details', compact('book'));
    }

    public function search(Request $r)
    {
        $query = $r->q;

        $books = Book::where('title', 'LIKE', "%$query%")->get();

        return view('user.search_results', compact('books', 'query'));
    }
}
