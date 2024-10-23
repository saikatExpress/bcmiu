<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/link', function () {
    Artisan::call('storage:link');
    return 'Storage Link Successfully';
});

Route::get('/clear', function(){
    Artisan::call('optimize:clear');
    return 'Optimize Clear!.';
})->name('clear');

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'home')->name('home');
});

Route::prefix('login')->group(function(){
    Route::controller(LoginController::class)->group(function(){
        Route::get('/', 'create')->name('login');
        Route::post('/', 'store')->name('login.store');
    });
});

Route::prefix('signup')->group(function(){
    Route::controller(RegistrationController::class)->group(function(){
        Route::get('/', 'create')->name('signup.create');
        Route::post('/store', 'store')->name('register');
    });
});

Route::controller(RegistrationController::class)->group(function(){
    Route::get('/get/division/{id}', 'getDistrict');
    Route::get('/get/upazila/{id}', 'getUpazila');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/about', 'about')->name('about');
    Route::get('/terms/condition', 'term')->name('termscondition');
    Route::get('/privacy/policy', 'privacypolicy')->name('privacy.policy');
    Route::get('/support', 'support')->name('support');
    Route::get('/service/show/{id}', 'show')->name('service.show');
    Route::get('/disclaimer', 'disclaimer')->name('disclaimer');
    Route::get('/help', 'help')->name('help');
    Route::get('/instruction', 'instruction')->name('instruction');
    Route::get('/feature', 'feature')->name('feature');
    Route::get('/offer', 'offer')->name('offer');
    Route::get('/package/view/{slug}', 'view')->name('package.view');
    Route::post('/buy', 'purchase')->name('buy');
    Route::get('/get/user/via/email/{email}', 'getUserViaEmail');
    Route::get('/feedback', 'feedback')->name('feedback');
    Route::post('/feedback/store', 'store')->name('feedback.store');
    Route::get('/retrive/user/{email}', 'retriveUser');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout.us');