<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [HomeController::class, 'index']);

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/new-category', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/{slug}', [CategoryController::class, 'delete'])->name('categories.delete');
});

Route::group(['prefix' => 'items'], function () {
    Route::get('/', [ItemController::class, 'index'])->name('items.index');
    Route::post('/', [ItemController::class, 'store'])->name('items.store');

    Route::post('/apply-discount', [ItemController::class, 'applyDiscount'])->name('items.apply-discount');

    Route::delete('/{slug}', [ItemController::class, 'delete'])->name('items.delete');
});