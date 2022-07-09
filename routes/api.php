<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get( '/user', function ( Request $reques ) {
    return $request->user();
});

Route::get('/items', [ItemController::class, 'index']);
Route::prefix('/item' )->group(function() {
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});

Route::get('/tags', [TagController::class, 'index']);
Route::prefix('/tag')->group(function() {
    Route::post('/store', [TagController::class, 'store']);
    Route::put('/{id}', [TagController::class, 'update']);
    Route::delete('/{id}', [TagController::class, 'destroy']);
});

Route::get('/productswithtags', [ProductController::class, 'productsWithTags']);
Route::get('/products', [ProductController::class, 'index']);
Route::prefix('/product')->group(function() {
    Route::post('/store', [ProductController::class, 'store']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});
