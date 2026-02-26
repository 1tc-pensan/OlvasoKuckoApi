<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::InRandomOrder()->first()->id,
            'borrower_name' => $this->faker->name(),
            'borrowed_at' => $this->faker->date(),
            'returned_at' => null,
        ];
    }
}
