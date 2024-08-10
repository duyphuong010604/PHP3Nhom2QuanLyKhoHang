<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;



Route::prefix('trang-chu')
->name('trang-chu.')
->middleware('auth')
->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});