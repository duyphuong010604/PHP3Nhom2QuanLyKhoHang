<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutboundShipmentController;

Route::prefix('xuat-hang')->name('xuat-hang.')->group(function () {
    Route::get('/', [OutboundShipmentController::class, 'index'])->name('index');
    Route::get('/tao-moi', [OutboundShipmentController::class, 'create'])->name('create');
    Route::post('/', [OutboundShipmentController::class, 'store'])->name('store');
    Route::get('/{id}', [OutboundShipmentController::class, 'show'])->name('show');
    Route::get('/{id}/chinh-sua', [OutboundShipmentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [OutboundShipmentController::class, 'update'])->name('update');
    Route::delete('/{id}', [OutboundShipmentController::class, 'destroy'])->name('destroy');
});