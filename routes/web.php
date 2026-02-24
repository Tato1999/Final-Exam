<?php
require __DIR__.'/front.php';
require __DIR__.'/dashboard.php';
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('main.index');
});

Route::get('/categories', function () {
    return view('main.category');
});

Route::get('/category/{slug}', function () {
    return view('main.category_posts');
});

Route::get('/posts', function () {
    return view('main.posts');
});

Route::get('/post/{id}', function () {
    return view('main.single');
});
Route::get('/about', function () {
    return view('main.about');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

