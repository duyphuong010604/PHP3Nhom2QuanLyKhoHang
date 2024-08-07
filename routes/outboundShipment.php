<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\OutboundShipments\Index;
use App\Livewire\OutboundShipments\OutboundShipmentCreate;
use App\Livewire\OutboundShipments\OutboundShipmentDetail;

    
Route::prefix('xuat-hang')->name('xuat-hang.')->group(function () {
    Route::get('/', Index::class)->name('index'); 
    Route::get('/tao-moi',OutboundShipmentCreate::class)->name('create');
    Route::get('/{id}',OutboundShipmentDetail::class)->name('detail');

    // Route::post('/', [OutboundShipmentController::class, 'store'])->name('store');
    // Route::get('/{id}', [OutboundShipmentController::class, 'show'])->name('show');
    // Route::get('/{id}/chinh-sua', [OutboundShipmentController::class, 'edit'])->name('edit');
    // Route::put('/{id}', [OutboundShipmentController::class, 'update'])->name('update');
    // Route::delete('/{id}', [OutboundShipmentController::class, 'destroy'])->name('destroy');
});