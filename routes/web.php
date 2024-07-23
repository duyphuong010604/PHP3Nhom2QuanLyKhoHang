<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customers.show');
});

Route::get('edit_stock', function () {
    return view('stocks.edit');
});