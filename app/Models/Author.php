<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    // Relasi ke buku
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Relasi ke rating melalui buku
    public function ratings()
    {
        return $this->hasManyThrough(Rating::class, Book::class);
    }
}
