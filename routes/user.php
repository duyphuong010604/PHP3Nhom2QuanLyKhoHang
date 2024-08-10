<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;

// Route::prefix('tai-khoan')->name('tai-khoan.')->group(function () {
//     // Các route không yêu cầu đăng nhập
//     Route::get('/', [UserController::class, 'index'])->name('index');
//     Route::get('/tao-moi', [UserController::class, 'create'])->name('create');
//     Route::post('/dang-nhap', [UserController::class, 'login'])->name('login.submit');
//     Route::post('/dang-ky', [UserController::class, 'store'])->name('store');
//     Route::get('login/google', [UserController::class, 'redirectToGoogle'])->name('login.google');
//     Route::get('login/google/callback', [UserController::class, 'handleGoogleCallback'])->name('google.callback');

//     // Các route cập nhật mật khẩu
//     // Hiển thị form để yêu cầu liên kết đặt lại mật khẩu

//     Route::get('/{id}', [UserController::class, 'show'])->name('show');
//     Route::get('/{id}/chinh-sua', [UserController::class, 'edit'])->name('edit');
//     Route::put('/{id}', [UserController::class, 'update'])->name('update');
//     Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');



<<<<<<< HEAD

// });
//     Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

//     Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

//     Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

//     Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
//     Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->name('verification.verify');

//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->name('verification.send');

//     Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

//     Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
//     Route::put('password', [PasswordController::class, 'update'])->name('password.update');
=======

});
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');

Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->name('verification.verify');

Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->name('verification.send');

Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
Route::put('password', [PasswordController::class, 'update'])->name('password.update');
>>>>>>> origin/dev/develop
// Route::middleware('auth.check')->group(function () {
//     Route::prefix('tai-khoan')->name('tai-khoan.')->group(function () {
//         // Các route yêu cầu đăng nhập
//         Route::get('/{id}', [UserController::class, 'show'])->name('show');
//         Route::get('/{id}/chinh-sua', [UserController::class, 'edit'])->name('edit');
//         Route::put('/{id}', [UserController::class, 'update'])->name('update');
//         Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
//     });
// });
Route::middleware('guest')->group(function () {
    Route::get('/tao-moi', [UserController::class, 'create'])->name('create');

    Route::post('/dang-ky', [UserController::class, 'store'])->name('store');

    Route::post('/dang-nhap', [UserController::class, 'login'])->name('login.submit');

    Route::get('/', [UserController::class, 'index'])->name('index');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
    Route::get('login/google', [UserController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [UserController::class, 'handleGoogleCallback'])->name('google.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

});




