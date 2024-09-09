<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'CheckUser'])->group(function(){
    Route::prefix('user')->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('/', 'index')->name('user.dashboard');
        });
    });
});