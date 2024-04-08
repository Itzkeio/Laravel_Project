<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('categories', CategoryController::class); 
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update'); // Add this route
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
