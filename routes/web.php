<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route yang wajib login (Protected Routes)
Route::middleware(['auth'])->group(function () {
    Route::resource('members', MemberController::class);
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
});