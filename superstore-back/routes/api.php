<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;

Route::group([], function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/create-product', [ProductController::class, 'create']);
    Route::put('/edit-product/{id}', [ProductController::class, 'update']);
    Route::delete('/delete-products/{id}', [ProductController::class, 'delete']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/create-category', [CategoryController::class, 'create']);
    Route::put('/edit-category/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete-category/{id}', [CategoryController::class, 'delete']);

    Route::get('/categories-products/{id}', [CategoryController::class, 'getProductsByCategory']);
});
