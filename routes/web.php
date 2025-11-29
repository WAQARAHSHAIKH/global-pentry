<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Homepage Route
Route::get('/', [RecipeController::class, 'homepage'])->name('homepage');

// Login Route
Route::get('/login', function () {
    return view('login'); // Assuming you have login.blade.php
})->name('login');

// Front-end Recipe Browsing
Route::get('/browse', [RecipeController::class, 'browse'])->name('browse');

// Single Recipe Detail Page
Route::get('/recipe_detail/{recipe}', [RecipeController::class, 'detail'])->name('recipe_detail');

// Cart & Checkout Pages
Route::get('/cart', function(){
    return view('cart');
})->name('cart');

Route::get('/checkout', function(){
    return view('checkout');
})->name('checkout');

// --- Admin Routes ---
// Admin Dashboard
Route::get('/admin', [RecipeController::class, 'index'])->name('admin.index');

// Admin CRUD Routes for Recipes
Route::prefix('admin')->group(function () {
    Route::resource('recipes', RecipeController::class);
});
