<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'auth.',
    'prefix' => 'auth',
    'middleware' => 'guest',
], static function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::group([
    'as' => 'auth.',
    'middleware' => Authenticate::class,
], static function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group([
    'as' => 'profile.',
    'middleware' => Authenticate::class,
    'prefix' => 'profile',
], static function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('index');
    Route::get('/security', [ProfileController::class, 'security'])->name('security');
    Route::get('/project', [ProfileController::class, 'project'])->name('project');
    Route::get('/team', [ProfileController::class, 'team'])->name('team');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
