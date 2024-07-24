<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customers.show');
});

Route::get('edit_stock', function () {
    return view('stocks.edit');
});

Route::get('profile', function () {
    return view('profiles.index');
});

Route::get('edit_profile', function() {
    return view('profiles.edit');
}); 