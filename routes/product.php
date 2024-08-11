<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Livewire\Products\ProductCreate;
use App\Livewire\Products\ProductLists;
use App\Livewire\Products\ProductUpdate;
use App\Livewire\Products\ProductView;
use App\Livewire\TestList;

Route::prefix('san-pham')->name('san-pham.')->middleware('auth')->group(function () {
    Route::get('/', ProductLists::class)->name('index');
    Route::get('/tao-moi', ProductCreate::class)->name('create');
    Route::post('/', ProductCreate::class)->name('store');
    Route::get('/{id}', ProductView::class)->name('show');
    Route::get('/{id}/chinh-sua', ProductUpdate::class)->name('edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
});