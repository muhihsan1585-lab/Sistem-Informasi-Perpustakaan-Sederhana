<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', function () {
        return view('petugas.dashboard');
    })->name('dashboard');
});

// Admin dan Petugas: bisa melihat kategori
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');
});

// Admin: bisa mengelola kategori
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class)
        ->except(['index']);
});

// Admin dan Petugas: bisa mengelola buku dan anggota
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::resource('members', MemberController::class);
    Route::resource('books', BookController::class);
});
