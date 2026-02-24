<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserController;

Route::name('dashboard.')->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });

    

});

Route::name('dashboard.')->prefix('api')->middleware('auth')->group(function () {
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.store');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::patch('/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/roles', function(){
        return response()->json([
            'roles' => App\Models\Role::all()
        ]);
    })->name('roles.index');
});