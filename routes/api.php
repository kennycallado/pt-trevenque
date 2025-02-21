<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get(
        '/',
        [CategoryController::class, 'index']
    )->name('api.categories.index');

    Route::get(
        '/{id}',
        [CategoryController::class, 'show']
    )->name('api.categories.show');

    Route::post(
        '/',
        [CategoryController::class, 'store']
    )->name('api.categories.store');

    Route::delete(
        '/{id}',
        [CategoryController::class, 'delete']
    )->name('api.categories.delete');

    Route::put(
        '/{id}',
        [CategoryController::class, 'update']
    )->name('api.categories.update');
});

Route::prefix('products')->group(function () {
    Route::get(
        '/',
        [ProductController::class, 'index']
    )->name('api.products.index');

    Route::get(
        '/{id}',
        [ProductController::class, 'show']
    )->name('api.products.show');

    Route::post(
        '/',
        [ProductController::class, 'store']
    )->name('api.products.store');

    Route::delete(
        '/{id}',
        [ProductController::class, 'delete']
    )->name('api.products.delete');

    Route::put(
        '/{id}',
        [ProductController::class, 'update']
    )->name('api.products.update');

    Route::put(
        '/toggle/{id}',
        [ProductController::class, 'toggleActive']
    )->name('api.products.toggle');
});
