<?php

use App\Http\Controllers\Api\CategoryController;
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
