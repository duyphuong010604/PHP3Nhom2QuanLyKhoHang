<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Livewire\Dashboard;

Route::prefix('trang-chu')->name('trang-chu.')->middleware('auth')->group(function () {
    Route::get('/', Dashboard::class)->name('index');
});