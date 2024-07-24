<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::prefix('doi-tac')->name('doi-tac.')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::get('/tao-moi', [CustomerController::class, 'create'])->name('create');
    Route::post('/', [CustomerController::class, 'store'])->name('store');
    Route::get('/{id}', [CustomerController::class, 'show'])->name('show');
    Route::get('/{id}/chinh-sua', [CustomerController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('destroy');
});