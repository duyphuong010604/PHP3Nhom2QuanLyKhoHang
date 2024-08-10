<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Livewire\Stocks\StockList;
use App\Livewire\Stocks\StockCreate;
use App\Livewire\Stocks\StockUpdate;
use App\Livewire\Stocks\StockView;

Route::prefix('ton-kho')->name('ton-kho.')->middleware('check.stock.access')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('index');
    Route::get('/tao-moi', [StockController::class, 'create'])->name('create');
    Route::post('/', [StockController::class, 'store'])->name('store');
    Route::get('/{id}', [StockController::class, 'show'])->name('show');
    Route::get('/{id}/chinh-sua', [StockController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StockController::class, 'update'])->name('update');
    Route::delete('/{id}', [StockController::class, 'destroy'])->name('destroy');
});