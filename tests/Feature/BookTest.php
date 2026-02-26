<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;

class BookTest extends TestCase
{
    use RefreshDatabase;
    public function test_index_show_all(): void
    {
        //Arrrange
            //Arrange
            Book::factory()->count(3)->create();
        //Act
        $response=$this->getJson('/api/books');
        //assert
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
}
