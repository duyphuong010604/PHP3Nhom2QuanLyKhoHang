<?php

use App\Http\Controllers\UserProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    // Để xử lý cập nhật hồ sơ
Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');

});
