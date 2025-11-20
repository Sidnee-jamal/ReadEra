
<?php

use Illuminate\Support\Facades\Route;


// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Registration view
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Registration POST
use App\Http\Controllers\AuthController;
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Login view
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Login POST
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Profile view (requires auth)
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');
Route::get('/profile/edit', [AuthController::class, 'editProfile'])->middleware('auth')->name('profile.edit');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->middleware('auth')->name('profile.update');

// Book listing view (requires auth)
Route::get('/books', function () {
    // Example: pass books array to view
    $user = Auth::user();
    $books = [];
    if ($user && ($user->is_premium ?? false)) {
        $books = [
            ['title' => 'Premium Book 1'],
            ['title' => 'Premium Book 2'],
            ['title' => 'Free Book 1'],
        ];
    } else {
        $books = [
            ['title' => 'Free Book 1'],
        ];
    }
    return view('books', compact('books'));
})->middleware('auth')->name('books');

// Logout POST
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
