<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        "title"=>$this->faker->word,
        "author_id"=> $this->faker->numberBetween(1, 1000),
        "category_id"=> $this->faker->numberBetween(1, 3000),
        ];
    }
}
