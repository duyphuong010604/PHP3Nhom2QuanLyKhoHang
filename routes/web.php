<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/trang-chu', function () {
    return view('dashboards.index');
})->middleware(['auth', 'verified'])->name('trang-chu.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__ . "/dashboard.php";
require __DIR__ . "/product.php";
require __DIR__ . "/customer.php";
require __DIR__ . "/inboundShipment.php";
require __DIR__ . "/outboundShipment.php";
require __DIR__ . "/stock.php";

