<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::prefix('tai-khoan')->name('tai-khoan.')->group(function () {
    // Các route không yêu cầu đăng nhập
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/tao-moi', [UserController::class, 'create'])->name('create');
    Route::post('/dang-nhap', [UserController::class, 'login'])->name('login.submit');
    Route::post('/dang-ky', [UserController::class, 'store'])->name('store');
    Route::get('login/google', [UserController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [UserController::class, 'handleGoogleCallback'])->name('google.callback');

    // Routes for password reset
    Route::get('/forgot-password', [UserController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [UserController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [UserController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [UserController::class, 'reset'])->name('password.update');
   
});

Route::middleware('auth.check')->group(function () {
    Route::prefix('tai-khoan')->name('tai-khoan.')->group(function () {
        // Các route yêu cầu đăng nhập
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/{id}/chinh-sua', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });
});





