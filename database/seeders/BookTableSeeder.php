<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batchSize = 1000; // Ukuran batch
        $totalBooks = 100000; // Total data buku

        for ($i = 0; $i < ceil($totalBooks / $batchSize); $i++) {
            $books = Book::factory()->count($batchSize)->make()->toArray();
            Book::insert($books);
        }
    }
}
