<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\WebsiteController;
use App\Http\Controllers\admin\AdminUserController;

Route::middleware(['auth', 'CheckAdmin'])->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::controller(AdminController::class)->group(function(){
            Route::get('/', 'index')->name('admin.dashboard');
        });
    });

    Route::controller(AdminUserController::class)->group(function(){
        Route::get('/admin/list', 'adminIndex')->name('adminlist');
        Route::get('/create/admin', 'createAdmin')->name('create-admin');
        Route::post('/admin/store', 'storeAdmin')->name('adminstore');
    });

    Route::prefix('branch')->group(function(){
        Route::controller(BranchController::class)->group(function(){
            Route::get('/list', 'index')->name('branch-list');
            Route::get('/create', 'create')->name('create.branch');
            Route::post('/save', 'store')->name('branch-store');
            Route::post('/edit', 'update')->name('edit.branch');
            Route::get('/delete/{id}', 'destroy')->name('branches.destroy');
        });
    });

    Route::prefix('user')->group(function(){
        Route::controller(AdminUserController::class)->group(function(){
            Route::get('/list', 'index')->name('userlist');
            Route::get('/create', 'create')->name('createuser');
            Route::post('/store', 'store')->name('usersstore');
        });
    });

    Route::prefix('notice')->group(function(){
        Route::controller(NoticeController::class)->group(function(){
            Route::get('/list', 'index')->name('notices.index');
            Route::get('/', 'create')->name('notice');
            Route::post('/', 'store')->name('notices.store');
            Route::get('/delete/{id}', 'destroy')->name('notice-destroy');
        });
    });

    Route::prefix('group')->group(function(){
        Route::controller(GroupController::class)->group(function(){
            Route::get('/list', 'index')->name('group-list');
            Route::get('/create', 'create')->name('create.group');
            Route::post('/store', 'store')->name('group-store');
        });
    });

    Route::get('/user/{id}/edit', [AdminUserController::class, 'edit']);
    Route::post('/users/{id}/update', [AdminUserController::class, 'update']);

    // For Location
    Route::get('/get-divisions', [LocationController::class, 'getDivisions']);
    Route::get('/get-districts/{divisionId}', [LocationController::class, 'getDistricts']);
    Route::get('/get-upazilas/{districtId}', [LocationController::class, 'getUpazilas']);

    Route::get('/groups/{id}/edit', [GroupController::class, 'edit']);
    Route::put('/groups/{id}', [GroupController::class, 'update']);
    Route::get('/group/delete/{id}', [GroupController::class, 'destroy']);

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