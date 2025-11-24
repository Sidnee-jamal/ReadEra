<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGenreController extends Controller
{
    public function create()
    {
        return view('admin.genres.create');
    }
    public function index()
    {
        // Fetch all genres (replace with your Genre model logic)
        $genres = \App\Models\Genre::all();
        return view('admin.genres.index', compact('genres'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $genre = new \App\Models\Genre();
        $genre->name = $validated['name'];
        $genre->save();
        return redirect()->route('admin.genres.index')->with('success', 'Genre added successfully!');
    }

    public function destroy($id)
    {
        $genre = \App\Models\Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('success', 'Genre deleted successfully!');
    }

    public function edit($id)
    {
        $genre = \App\Models\Genre::findOrFail($id);
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $genre = \App\Models\Genre::findOrFail($id);
        $genre->name = $validated['name'];
        $genre->save();
        return redirect()->route('admin.genres.index')->with('success', 'Genre updated successfully!');
    }
}
