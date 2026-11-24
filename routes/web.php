<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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

// Admin: manajemen user
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});

// Admin dan Petugas: mengelola peminjaman
Route::middleware(['auth', 'role:admin,petugas'])
    ->group(function () {

        Route::get('/borrowings', [BorrowingController::class, 'index'])
            ->name('borrowings.index');

        Route::get('/borrowings/create', [BorrowingController::class, 'create'])
            ->name('borrowings.create');

        Route::post('/borrowings', [BorrowingController::class, 'store'])
            ->name('borrowings.store');

        Route::get('/borrowings/{borrowing}', [BorrowingController::class, 'show'])
            ->name('borrowings.show');

        Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])
            ->name('borrowings.return');
    });