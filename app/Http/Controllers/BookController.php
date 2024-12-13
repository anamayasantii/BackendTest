<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $query = $request->input('query', '');

        $books = Book::with(['author', 'ratings'])
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhereHas('author', function ($q) use ($query) {
                      $q->where('name', 'like', "%{$query}%");
                  });
            })
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->orderByDesc('ratings_count')
            ->orderByDesc('ratings_avg_rating')
            ->paginate($perPage);

        // Return data ke view
        return view('books.index', compact('books', 'query'));
    }
}
