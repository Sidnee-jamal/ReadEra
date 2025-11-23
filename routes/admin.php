<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminUserController;

Route::middleware(['auth','is_admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('/books')->group(function () {
        Route::get('/', [AdminBookController::class, 'index'])->name('admin.books.index');
        Route::get('/create', [AdminBookController::class, 'create'])->name('admin.books.create');
        Route::post('/create', [AdminBookController::class, 'store'])->name('admin.books.store');
        Route::get('/edit/{id}', [AdminBookController::class, 'edit'])->name('admin.books.edit');
        Route::post('/edit/{id}', [AdminBookController::class, 'update'])->name('admin.books.update');
        Route::get('/delete/{id}', [AdminBookController::class, 'destroy'])->name('admin.books.delete');
    });

    Route::prefix('/genres')->group(function () {
        Route::get('/', [AdminGenreController::class, 'index'])->name('admin.genres.index');
        Route::get('/create', [AdminGenreController::class, 'create'])->name('admin.genres.create');
        Route::post('/create', [AdminGenreController::class, 'store'])->name('admin.genres.store');
        Route::get('/edit/{id}', [AdminGenreController::class, 'edit'])->name('admin.genres.edit');
        Route::post('/edit/{id}', [AdminGenreController::class, 'update'])->name('admin.genres.update');
        Route::get('/delete/{id}', [AdminGenreController::class, 'destroy'])->name('admin.genres.delete');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.delete');
        Route::get('/promote/{id}', [AdminUserController::class, 'promote'])->name('admin.users.promote');
    });

});
