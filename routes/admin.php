<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\WebsiteController;


Route::middleware(['auth', 'CheckAdmin'])->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::controller(AdminController::class)->group(function(){
            Route::get('/', 'index')->name('admin.dashboard');
        });
    });

    Route::prefix('user')->group(function(){
        Route::controller(AdminUserController::class)->group(function(){
            Route::get('/list', 'index')->name('userlist');
            Route::get('/fetch', 'fetchUsers')->name('users.fetch');
            Route::get('/create', 'create')->name('createuser');
            Route::post('/store', 'store')->name('usersstore');
        });
    });

    Route::prefix('notice')->group(function(){
        Route::controller(NoticeController::class)->group(function(){
            Route::get('/list', 'index')->name('notices.index');
            Route::get('/', 'create')->name('notice');
            Route::post('/', 'store')->name('notices.store');
        });
    });

    Route::controller(WebsiteController::class)->group(function(){
        Route::get('/website/setting', 'create')->name('website.setting');
        Route::get('/project/info', 'projectCreate')->name('project.info');
        Route::post('/project/update', 'update')->name('project.update');
    });

    Route::controller(FaqController::class)->group(function(){
        Route::get('/faq/list', 'index')->name('faq.list');
        Route::get('/create/faq', 'create')->name('create.faq');
        Route::post('/faq/store', 'store')->name('faq.store');
        Route::post('/update/edit', 'update')->name('faq.edit');
        Route::get('/faq/delete/{id}', 'destroy');
    });

    Route::controller(AboutController::class)->group(function(){
        Route::get('/create/about', 'create')->name('create.about');
        Route::post('/about/update', 'update')->name('abouts.update');
    });

    Route::controller(ServiceController::class)->group(function(){
        Route::get('/service/list', 'index')->name('service.list');
        Route::get('/create/service', 'create')->name('create.service');
        Route::post('/services/store', 'store')->name('services.store');
        Route::post('/update/services', 'update')->name('service.edit');
        Route::get('/service/delete/{id}', 'destroy');
    });

    Route::controller(BannerController::class)->group(function(){
        Route::get('/banner/list', 'index')->name('banner.list');
        Route::get('/create/banner', 'create')->name('create.banner');
        Route::post('/banners/store', 'store')->name('banners.store');
        Route::get('banners/{id}', 'show')->name('banners.show');
        Route::post('/banners/update', 'update')->name('banners.update');
        Route::get('/banner/delete/{id}', 'destroy');
    });

    Route::get('/notices/data', [NoticeController::class, 'data'])->name('notices.data');

});