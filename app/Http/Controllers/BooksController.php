<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function store()
    {
        Book::create([
            'title' => 'Some title',
            'author' => 'Some Author'
        ]);
    }
}
