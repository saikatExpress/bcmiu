<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'CheckAdmin'])->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::controller(AdminController::class)->group(function(){
            Route::get('/', 'index')->name('admin.dashboard');
        });
    });
});