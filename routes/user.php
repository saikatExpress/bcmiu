<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'CheckUser'])->group(function(){
    Route::prefix('user')->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('/', 'index')->name('user.dashboard');
        });
    });

    Route::controller(PostController::class)->group(function(){
        Route::get('/feed', 'fetchPosts')->name('feed');
        Route::post('/post/store', 'store')->name('posts.store');
        Route::post('/comments/store', 'commentStore')->name('comments.store');
    });
});