<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    //Mass-assignable fields
    protected $fillable = [
        'title',
        'author',
        
    ];

    //We can also use guarded property so that by default all fields can't be entered unless explicitly defined. 
    //protected $guarded = [];

    //Create a helper to return the route to the Book id

    public function path()
    {
        return '/book/' . $this->id;
    }
}
