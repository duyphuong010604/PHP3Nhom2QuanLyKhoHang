<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::middleware('web')->group(function () {
    Route::get('/san-pham', [ProductController::class, 'index'])->name('san-pham.index');
    Route::get('/san-pham/tao-moi', [ProductController::class, 'create'])->name('san-pham.create');
    Route::post('/san-pham', [ProductController::class, 'store'])->name('san-pham.store');
    Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('san-pham.show');
    Route::get('/san-pham/{id}/chinh-sua', [ProductController::class, 'edit'])->name('san-pham.edit');
    Route::put('/san-pham/{id}', [ProductController::class, 'update'])->name('san-pham.update');
    Route::delete('/san-pham/{id}', [ProductController::class, 'destroy'])->name('san-pham.destroy');
});