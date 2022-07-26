<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/books', [BooksController::class, 'store']);
Route::patch('/books/{book}', [BooksController::class, 'update']); //route model binding 
Route::delete('/books/{book}', [BooksController::class, 'destroy']); //route model binding 

Route::post('/authors', [AuthorsController::class, 'store']);



