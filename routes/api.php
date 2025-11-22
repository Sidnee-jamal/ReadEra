<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// User profile endpoint (to be implemented)
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');

// Book listing endpoint (to be implemented)
Route::get('/books', [AuthController::class, 'listBooks'])->middleware('auth');

// Example admin route
Route::get('/admin/dashboard', function () {
    return response()->json(['message' => 'Welcome, Admin!']);
})->middleware(['auth', 'isAdmin']);

// Example user route
Route::get('/user/home', function () {
    return response()->json(['message' => 'Welcome, User!']);
})->middleware(['auth', 'isUser']);
