<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function popularAuthors()
    {
        $authors = Author::select('authors.*')
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->join('ratings', 'books.id', '=', 'ratings.book_id')
            ->where('ratings.rating', '>', 5)
            ->selectRaw('COUNT(ratings.id) as voters_count')
            ->groupBy('authors.id')
            ->orderByDesc('voters_count')
            ->take(10) 
            ->get();

        return view('books.popular', compact('authors'));
    }
}

