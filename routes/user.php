<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::prefix('tai-khoan')->name('tai-khoan.')->group(function () {
    Route::get('/',[UserController::class, 'index'])->name('index');
    Route::get('/', [UserController::class, 'create'])->name('create');
    Route::post('/dang-nhap', [UserController::class, 'login'])->name('login.submit');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}', [UserController::class, 'show'])->name('show');
    Route::get('/{id}/chinh-sua', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});
