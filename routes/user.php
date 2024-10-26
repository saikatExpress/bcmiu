<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
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

    Route::controller(ProfileController::class)->group(function(){
        Route::get('/user/profile', 'create')->name('user.profile');
        Route::get('/profile/posts', 'post')->name('profile.posts');
        Route::get('/profile/about', 'about')->name('profile.about');
        Route::post('/update/profile', 'update')->name('profile.update');
        Route::post('/password/update', 'passUpdate')->name('update.password');
        Route::post('/location/update', 'locationUpdate')->name('update.location');
    });

    Route::controller(SettingController::class)->group(function(){
        Route::get('/user/setting', 'create')->name('user.settings');
    });
});