<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function store()
    {
        //This works
        // $data = request()->validate([
        //     'title' => 'required',
        //     'author' => 'required', 
            
        // ]);

        // Book::create($data);
        

        //this is better
        Book::create($this->validatedRequest());
    }

    public function update(Book $book)
    {
        // //This works:
        // $data = request()->validate([
        //     'title' => 'required',
        //     'author' => 'required', 
            
        // ]);

        // $book->update($data); 

        //This is better
        $book->update($this->validatedRequest());

    }
    
    //Avoiding DRY for the validation in all functions
    protected function validatedRequest()
    {
       return request()->validate([
            'title' => 'required',
            'author' => 'required',    
        ]);
    }
} 
