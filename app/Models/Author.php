<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob'
    ];
    //add columns that you want to be cast as carbon instances
    protected $dates = ['dob'];
    
    //format the dob as carbon before storing it inthe db 
    public function setDobAttribute($dob)
    {
        $this->attributes['dob'] =  Carbon::parse($dob);
    }
}
