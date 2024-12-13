<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['rating', 'book_id'];

    public function book()
    {
        return $this->belongsTo(Book::class); // Relasi N:1 antara Rating dan Book
    }
}
