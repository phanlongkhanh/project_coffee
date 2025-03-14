<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RemoveMenuController;
use App\Http\Controllers\API\MyAccountController;
use App\Http\Controllers\API\RemoveCategoryMenuController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('/menu/{id}', [RemoveMenuController::class, 'destroy'])->name('destroy-menu');
Route::delete('/category/menu/{id}', [RemoveCategoryMenuController::class, 'destroy'])->name('destroy-category-menu');
Route::middleware('auth:sanctum')->get('/account', [MyAccountController::class, 'account']);
