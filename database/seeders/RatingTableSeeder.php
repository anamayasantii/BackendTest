<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batchSize = 500; // Ukuran batch
        $totalRatings = 500000; // Total data buku

        for ($i = 0; $i < ceil($totalRatings / $batchSize); $i++) {
            $ratings = Rating::factory()->count($batchSize)->make()->toArray();
            Rating::insert($ratings);
        }
    }
}
