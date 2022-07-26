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
        $book =  Book::create($this->validatedRequest());

        //return redirect('/books/' . $book->id);
        return redirect($book->path());

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

        //return redirect('/books/' . $book->id);
        //This is a better way using a helper function defined inside the Book model
        return redirect($book->path());
 


    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
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
