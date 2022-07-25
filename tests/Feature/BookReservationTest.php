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

    /**
     * @test
     * 
     */
    public function a_book_title_is_required()
    {
       // $this->withoutExceptionHandling();
        //If a book has a missing title
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Bright Onapito', 
        ]);
        //Throw an error about the missing title 
        $response->assertSessionHasErrors('title');

    }

    /**
     * @test
     * 
     */
    public function a_book_author_is_required()
    {
       // $this->withoutExceptionHandling();
        //If a book has a missing author
        $response = $this->post('/books', [
            'title' => 'Some Title',
            'author' => '', 
        ]);
        //Throw an error about the missing author 
        $response->assertSessionHasErrors('author');

    }

     /**
     * @test
     * 
     */
    public function a_book_can_be_updated()
    {
          $this->withoutExceptionHandling();
        //A book as a title and author
        $this->post('/books', [
            'title' => 'Some Title',
            'author' => 'Bright Onapito', 
        ]);

        $book = Book::first(); //grab the id of the book

        //if the title and or author is updated,
        $response = $this->patch('/books/' . $book->id, [
            'title' => 'New Title',
            'author'=> 'New Author',
        ]);

        //Return updated fields
        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('New Author', Book::first()->author);

        
    }
} 
