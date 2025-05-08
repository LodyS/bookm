<?php

namespace Database\Factories;
use App\Models\BookReview;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookReview>
 */
class BookReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BookReview::class;

    public function definition(): array
    {
        return [
            'review'=>fake()->randomElement(range(1,10)),
            'comment'=>fake()->text()
        ];
    }
}
