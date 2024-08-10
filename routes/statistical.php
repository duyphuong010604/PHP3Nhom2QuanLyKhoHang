<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Statistical;

Route::prefix('thong-ke')->name('thong-ke.')->middleware('auth')->group(function () {
    Route::get('/', Statistical::class)->name('index');
});