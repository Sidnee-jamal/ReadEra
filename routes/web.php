<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\GenreController;
// Removed: use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\ProfileController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Registration
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Profile
Route::get('/profile', function () {
    return view('user.profile');
})->middleware('auth')->name('profile');
Route::get('/profile/edit', [RegisterController::class, 'editProfile'])->middleware('auth')->name('profile.edit');
Route::post('/profile/update', [RegisterController::class, 'updateProfile'])->middleware('auth')->name('profile.update');

// My Books
Route::get('/my-books', [BookController::class, 'myBooks'])->middleware('auth')->name('my-books');

// Books
Route::get('/books', [BookController::class, 'index'])->middleware('auth')->name('books');
Route::get('/books/free', [BookController::class, 'freeBooks'])->middleware('auth');
Route::get('/books/{id}', [BookController::class, 'details'])->middleware('auth');

// Read Book Online
Route::get('/books/{id}/read', [BookController::class, 'readOnline'])->middleware('auth')->name('books.read');

// Download Book
Route::post('/books/{id}/download', [BookController::class, 'download'])->middleware('auth')->name('books.download');

// Genres
Route::get('/genres/{id}', [GenreController::class, 'show'])->middleware('auth');

// Search
Route::get('/search', [BookController::class, 'search'])->middleware('auth');

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/login', [LoginController::class, 'showLogin'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::get('/register', [RegisterController::class, 'showRegister'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegister']);
    Route::post('/register', [RegisterController::class, 'register']);

    // require __DIR__.'/admin.php'; // Removed, admin routes are now in this file
});

// Authenticated user
// (profile route already defined above)

// Admin routes (simplified)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/books', [App\Http\Controllers\Admin\AdminBookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/create', [App\Http\Controllers\Admin\AdminBookController::class, 'create'])->name('admin.books.create');
    Route::post('/books/create', [App\Http\Controllers\Admin\AdminBookController::class, 'store'])->name('admin.books.store');
    Route::get('/books/edit/{id}', [App\Http\Controllers\Admin\AdminBookController::class, 'edit'])->name('admin.books.edit');
    Route::post('/books/edit/{id}', [App\Http\Controllers\Admin\AdminBookController::class, 'update'])->name('admin.books.update');
    Route::get('/books/delete/{id}', [App\Http\Controllers\Admin\AdminBookController::class, 'destroy'])->name('admin.books.delete');
    Route::get('/genres', [App\Http\Controllers\Admin\AdminGenreController::class, 'index'])->name('admin.genres.index');
    Route::get('/genres/create', [App\Http\Controllers\Admin\AdminGenreController::class, 'create'])->name('admin.genres.create');
    Route::post('/genres/create', [App\Http\Controllers\Admin\AdminGenreController::class, 'store'])->name('admin.genres.store');
    Route::get('/genres/edit/{id}', [App\Http\Controllers\Admin\AdminGenreController::class, 'edit'])->name('admin.genres.edit');
    Route::post('/genres/edit/{id}', [App\Http\Controllers\Admin\AdminGenreController::class, 'update'])->name('admin.genres.update');
    Route::get('/genres/delete/{id}', [App\Http\Controllers\Admin\AdminGenreController::class, 'destroy'])->name('admin.genres.delete');
        Route::get('/users', [App\Http\Controllers\Admin\AdminUserController::class, 'index'])->middleware('auth')->name('admin.users.index');
        Route::delete('/users/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'destroy'])->middleware('auth')->name('admin.users.destroy');
});