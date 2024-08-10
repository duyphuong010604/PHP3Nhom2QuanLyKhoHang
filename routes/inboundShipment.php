<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboundShipmentController;
use App\Livewire\InboundShipments\Index;
use App\Livewire\InboundShipments\InboundShipmentCreate;
use App\Livewire\InboundShipments\InboundShipmentDetail;
use App\Livewire\InboundShipments\InboundShipmentUpdate;
use App\Livewire\InboundShipments\ScanBarcode;


Route::prefix('nhap-hang')->name('nhap-hang.')->group(function () {
    Route::get('/', Index::class)->name('index'); 
    Route::get('/tao-moi',InboundShipmentCreate::class)->name('create');
   Route::get('/{id}', InboundShipmentDetail::class)->name('detail');
    // Route::get('/{id}', [InboundShipmentController::class, 'show'])->name('show');
    // Route::get('/{id}/chinh-sua', InboundShipmentUpdate::class)->name('edit');
    route::get('/scan',ScanBarcode::class)->name('scan');
  
});
