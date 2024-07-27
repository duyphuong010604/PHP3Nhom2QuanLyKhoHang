<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboundShipmentController;

Route::prefix('nhap-hang')->name('nhap-hang.')->group(function () {
    Route::get('/', [InboundShipmentController::class, 'index'])->name('index');
    Route::get('/tao-moi', [InboundShipmentController::class, 'create'])->name('create');
    Route::post('/', [InboundShipmentController::class, 'store'])->name('store');
    Route::get('/{id}', [InboundShipmentController::class, 'show'])->name('show');
    Route::get('/{id}/chinh-sua', [InboundShipmentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [InboundShipmentController::class, 'update'])->name('update');
    Route::delete('/{id}', [InboundShipmentController::class, 'destroy'])->name('destroy');
});