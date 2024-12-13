<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    // Menampilkan form input rating
    public function create(Request $request)
    {
        $authors = Author::all();
        $selectedAuthor = $request->author_id;
        $books = $selectedAuthor
            ? Book::where('author_id', $selectedAuthor)->get()
            : [];

        return view('books.rating', compact('authors', 'books', 'selectedAuthor'));
    }

    // Menyimpan rating baru
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10', 
        ]);

        Rating::create([
            'book_id' => $request->book_id,
            'rating' => $request->rating,
        ]);

        return redirect()->route('books.index')->with('success', 'Rating berhasil ditambahkan!');
    }
}
