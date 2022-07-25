<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }


    
    /**
     * @test
     */

    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling(); //Tells Laravel not to sanitize the displayed errors so we can see exactly what is going on.
        //A book can be stored through POST
        $response = $this->post('/books', [
            'title' => 'Some Title',
            'author' => 'Bright Onapito'
        ]);

        $response->assertOk(); //return an OK response of 200 

        //When a book is added to the DB, the record count increases by 1
        $this->assertCount(1, Book::all());
    }
}
