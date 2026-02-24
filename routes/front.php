<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserController;


Route::name('posts.')->prefix('info/api/')->group(function () {
    
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});