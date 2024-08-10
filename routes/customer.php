<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Customers\CustomerLists;
use App\Livewire\Customers\CustomerCreate;
use App\Http\Controllers\CustomerController;
use App\Livewire\Customers\CustomerUpdate;
use App\Livewire\Customers\CustomerView;

Route::prefix('doi-tac')->name('doi-tac.')->group(function () {
    Route::get('/', CustomerLists::class )->name('index');
    Route::get('/tao-moi', CustomerCreate::class)->name('create');
    Route::post('/', [CustomerCreate::class, 'store'])->name('store');
    Route::get('/{id}', CustomerView::class)->name('show');
    Route::get('/{id}/chinh-sua', CustomerUpdate::class)->name('edit');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('destroy');
    
});

