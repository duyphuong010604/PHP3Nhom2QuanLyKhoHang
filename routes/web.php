<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('products.show');
});

Route::get('stocks', function () {
    return view('stocks.index');
});
Route::get('view_stock', function () {
    return view('stocks.show');
});

Route::get('create_stock', function () {
    return view('stocks.create');
});

Route::get('edit_stock', function () {
    return view('stocks.edit');
});