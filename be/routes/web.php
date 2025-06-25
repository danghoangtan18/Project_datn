<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Categories
    Route::resource('categories', CategoryController::class);

    // Products
    Route::resource('products', ProductController::class);

    // Users
    Route::resource('users', UserController::class);

    // Courts (tạm dùng thủ công nếu chưa làm controller)
    Route::prefix('courts')->group(function () {
        Route::get('/', fn() => view('admin.courts.index'))->name('courts.index');
        Route::get('/create', fn() => view('admin.courts.create'))->name('courts.create');
    });

    // Posts
    Route::prefix('posts')->group(function () {
        Route::get('/', fn() => view('admin.posts.index'))->name('posts.index');
        Route::get('/create', fn() => view('admin.posts.create'))->name('posts.create');
    });

    // Comments
    Route::prefix('comments')->group(function () {
        Route::get('/', fn() => view('admin.comments.index'))->name('comments.index');
    });
});
