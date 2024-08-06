<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Livewire\Profiles\ViewProfile;
use App\Livewire\Profiles\EditProfile;

Route::prefix('tai-khoan')->name('tai-khoan.')->group(function () {
    Route::get('/', ViewProfile::class)->name('index');
    Route::get('/tao-moi', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}', ViewProfile::class)->name('show');
    Route::get('/{id}/chinh-sua', EditProfile::class)->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});