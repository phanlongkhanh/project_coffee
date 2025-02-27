<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;






Route::get('/', action: [HomePageController::class, 'index'])->name('index-homepage');


Route::prefix('admin')->group(function () {
    Route::get('/', action: [DashboardController::class, 'dashboard'])->name('index-dashboard');
});

Route::prefix('login')->group(function () {
    Route::get('/', action: [LoginController::class, 'index'])->name('index-login');
    Route::get('/store', [LoginController::class, 'login'])->name('store-login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('profile')->group(function () {
    Route::get('/', action: [ProfileController::class, 'index'])->name('index-profile');
    Route::post('/{id}', [ProfileController::class, 'update'])->name('update-profile');
});


Route::prefix('profile-controlelr')->group(function () {
    Route::post('/update-password/{id}', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::post('/{id}', action: [ProfileController::class, 'UpdateImage'])->name('update-image');
});


Route::prefix('menu')->group(function () {
    Route::get('/', action: [MenuController::class, 'index'])->name('index-menu');
    Route::get(uri: '/create', action: [MenuController::class, 'create'])->name('create-menu');
    Route::get(uri: '/{id}', action: [MenuController::class, 'edit'])->name('edit-menu');
    Route::post('/add', [MenuController::class, 'store'])->name('store-menu');
    Route::put('/{id}', [MenuController::class, 'update'])->name('update-menu');
});