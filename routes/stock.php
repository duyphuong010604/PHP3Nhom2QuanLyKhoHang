<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Livewire\Stocks\StockList;
use App\Livewire\Stocks\StockCreate;
use App\Livewire\Stocks\StockUpdate;
use App\Livewire\Stocks\StockView;

Route::prefix('ton-kho')->name('ton-kho.')->group(function () {
    Route::get('/', StockList::class)->name('index');
    Route::get('/tao-moi', StockCreate::class)->name('create');
    Route::post('/', StockCreate::class)->name('store');
    Route::get('/{id}', StockView::class)->name('show');
    Route::get('/{id}/chinh-sua', StockUpdate::class)->name('edit');
    Route::put('/{id}', [StockController::class, 'update'])->name('update');
    Route::delete('/{id}', [StockController::class, 'destroy'])->name('destroy');
});