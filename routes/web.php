<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('web.index');

Route::prefix('products')->group(function () {
    Route::get(
        '/',
        [ProductController::class, 'index']
    )->name('web.products.index');

    Route::post(
        '/',
        [ProductController::class, 'store']
    )->name('web.products.store');

    Route::put(
        '/{id}',
        [ProductController::class, 'update']
    )->name('web.products.update');

    Route::get(
        '/create',
        [ProductController::class, 'create']
    )->name('web.products.create');

    Route::get(
        '/{id}',
        [ProductController::class, 'show']
    )->name('web.products.show');

    Route::delete(
        '/{id}',
        [ProductController::class, 'delete']
    )->name('web.products.delete');

    Route::put(
        '/toggle/{id}',
        [ProductController::class, 'toggleActive']
    )->name('web.products.toggle');
});
