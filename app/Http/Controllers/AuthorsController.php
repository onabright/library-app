<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function store()
    {
        //don't pass the entire request. only the columns we need
        Author::create(request()->only([
            'name', 'dob', 
        ]));
    }
}
