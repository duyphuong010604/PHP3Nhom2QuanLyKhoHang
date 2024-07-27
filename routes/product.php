<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Livewire\Products\ProductCreate;
use App\Livewire\Products\ProductLists;

Route::prefix('san-pham')->name('san-pham.')->group(function () {
    Route::get('/', ProductLists::class)->name('index');
    Route::get('/tao-moi', ProductCreate::class)->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/{id}/chinh-sua', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});