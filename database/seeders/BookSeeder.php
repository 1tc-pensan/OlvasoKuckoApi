<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'A könyv címe',
            'author' => 'Szerző neve',
            'available_copies' => 5,
        ]);
        Book::create([
                'title' => 'Másik könyv címe',
                'author' => 'Másik szerző neve',
                'available_copies' => 3,
        ]);
        Book::factory()->count(10)->create();
    }
}
