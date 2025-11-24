<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function update(Request $request, $id)
    {
        $book = \App\Models\Book::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genres' => 'required|array',
            'cover_image' => 'nullable|image',
            'file_path' => 'nullable|file|mimes:pdf',
            'is_premium' => 'nullable|boolean',
        ]);

        // Handle file uploads if present
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('covers', 'public');
            $book->cover_image = $coverPath;
        }
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('books', 'public');
            $book->file_path = $filePath;
        }

        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->description = $validated['description'] ?? '';
        $book->is_premium = $request->has('is_premium');
        $book->save();

        // Attach genres
        $book->genres()->sync($validated['genres']);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
        }
    public function edit($id)
    {
        $book = \App\Models\Book::findOrFail($id);
        $genres = \App\Models\Genre::all();
        return view('admin.books.edit', compact('book', 'genres'));
    }

    public function destroy($id)
    {
        $book = \App\Models\Book::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully!');
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genres' => 'required|array',
            'cover_image' => 'required|image',
            'file_path' => 'required|file|mimes:pdf',
            'is_premium' => 'nullable|boolean',
        ]);

        // Handle file uploads
        $coverPath = $request->file('cover_image')->store('covers', 'public');
        $filePath = $request->file('file_path')->store('books', 'public');

        // Create book
        $book = new \App\Models\Book();
        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->description = $validated['description'] ?? '';
        $book->cover_image = $coverPath;
        $book->file_path = $filePath;
        $book->is_premium = $request->has('is_premium');
        $book->save();

        // Attach genres
        $book->genres()->sync($validated['genres']);

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully!');
    }

    public function create()
    {
        // Fetch all genres for the select input
        $genres = \App\Models\Genre::all();
        return view('admin.books.create', compact('genres'));
    }

    public function index()
    {
        // Fetch all books (replace with your Book model logic)
        $books = \App\Models\Book::all();
        return view('admin.books.index', compact('books'));
    }
}
