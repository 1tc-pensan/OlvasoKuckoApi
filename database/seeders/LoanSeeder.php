<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\Book;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book=Book::first();
        if($book != null && $book->available_copies > 0){
            Loan::create([
                'book_id' => $book->id,
                'borrower_name' => 'Kölcsönző neve',
                'borrowed_at' => now()->subDays(10),
                'returned_at' => null,
            ]);
            $book->decrement('available_copies');
        }
            Loan::factory()->count(10)->create();
    }
}
