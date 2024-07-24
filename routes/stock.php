<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

Route::prefix('ton-kho')->name('ton-kho.')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('index');
    Route::get('/tao-moi', [StockController::class, 'create'])->name('create');
    Route::post('/', [StockController::class, 'store'])->name('store');
    Route::get('/{id}', [StockController::class, 'show'])->name('show');
    Route::get('/{id}/chinh-sua', [StockController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StockController::class, 'update'])->name('update');
    Route::delete('/{id}', [StockController::class, 'destroy'])->name('destroy');
});