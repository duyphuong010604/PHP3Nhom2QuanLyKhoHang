<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InboundShipmentController;
use App\Http\Controllers\OutboundShipmentController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/trang-chu', function () {
    return view('dashboards.index');
})->middleware(['auth', 'verified'])->name('trang-chu.index');


Route::middleware(['auth'])->group(function () {
    // Tuyến đường trang chủ
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Tuyến đường đối tác
    Route::prefix('doi-tac')->name('doi-tac.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/tao-moi', [CustomerController::class, 'create'])->name('create');
        Route::post('/', [CustomerController::class, 'store'])->name('store');
        Route::get('/{id}', [CustomerController::class, 'show'])->name('show');
        Route::get('/{id}/chinh-sua', [CustomerController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CustomerController::class, 'update'])->name('update');
        Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('destroy');
    });

    // Tuyến đường sản phẩm
    Route::prefix('san-pham')->name('san-pham.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/tao-moi', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/{id}/chinh-sua', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
    });

    // Tuyến đường nhập hàng (Inbound Shipments)
    Route::prefix('nhap-hang')->name('nhap-hang.')->group(function () {
        Route::get('/', [InboundShipmentController::class, 'index'])->name('index');
        Route::get('/tao-moi', [InboundShipmentController::class, 'create'])->name('create');
        Route::post('/', [InboundShipmentController::class, 'store'])->name('store');
        Route::get('/{id}', [InboundShipmentController::class, 'show'])->name('show');
        Route::get('/{id}/chinh-sua', [InboundShipmentController::class, 'edit'])->name('edit');
        Route::put('/{id}', [InboundShipmentController::class, 'update'])->name('update');
        Route::delete('/{id}', [InboundShipmentController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('xuat-hang')->name('xuat-hang.')->group(function () {
        Route::get('/', [OutboundShipmentController::class, 'index'])->name('index');
        Route::get('/tao-moi', [OutboundShipmentController::class, 'create'])->name('create');
        Route::post('/', [OutboundShipmentController::class, 'store'])->name('store');
        Route::get('/{id}', [OutboundShipmentController::class, 'show'])->name('show');
        Route::get('/{id}/chinh-sua', [OutboundShipmentController::class, 'edit'])->name('edit');
        Route::put('/{id}', [OutboundShipmentController::class, 'update'])->name('update');
        Route::delete('/{id}', [OutboundShipmentController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('ton-kho')->name('ton-kho.')->group(function () {
        Route::get('/', [StockController::class, 'index'])->name('index');
        Route::get('/tao-moi', [StockController::class, 'create'])->name('create');
        Route::post('/', [StockController::class, 'store'])->name('store');
        Route::get('/{id}', [StockController::class, 'show'])->name('show');
        Route::get('/{id}/chinh-sua', [StockController::class, 'edit'])->name('edit');
        Route::put('/{id}', [StockController::class, 'update'])->name('update');
        Route::delete('/{id}', [StockController::class, 'destroy'])->name('destroy');
    });
});
require __DIR__.'/auth.php';
// require __DIR__ . "/dashboard.php";
// require __DIR__ . "/product.php";
// require __DIR__ . "/customer.php";
// require __DIR__ . "/inboundShipment.php";
// require __DIR__ . "/outboundShipment.php";
// require __DIR__ . "/stock.php";

