<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function readOnline($id)
    {
        $book = Book::findOrFail($id);
        $pdfUrl = asset('storage/' . $book->file_path);
        return view('user.read_book', compact('book', 'pdfUrl'));
    }
    public function download($id)
    {
        $book = Book::findOrFail($id);
        $user = auth()->user();

        // Record download in user_books table
        $user->books()->syncWithoutDetaching([$book->id => ['downloaded_at' => now()]]);

        // Flash message for download start
        session()->flash('success', 'Download is starting...');

        // Force the file to download in browser
        $filePath = storage_path('app/public/' . $book->file_path);
        if (file_exists($filePath)) {
            return response()->download($filePath, $book->title . '.pdf');
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
    public function myBooks()
    {
        $books = auth()->user()->books()->orderByDesc('pivot_downloaded_at')->get();
        return view('user.my_books', compact('books'));
    }
    public function freeBooks()
    {
        $books = Book::where('is_premium', false)->get();
        return view('user.free_books', compact('books'));
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
