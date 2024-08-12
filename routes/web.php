<?php

use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboards.index');
})->middleware(['auth', 'verified'])->name('trang-chu.index');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
//     Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
//     Route::put('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
// });
require __DIR__.'/profiles.php';
require __DIR__.'/auth.php';
require __DIR__ . "/dashboard.php";
require __DIR__ . "/product.php";
require __DIR__ . "/customer.php";
require __DIR__ . "/inboundShipment.php";
require __DIR__ . "/outboundShipment.php";
require __DIR__ . "/stock.php";
require __DIR__ . "/statistical.php";

