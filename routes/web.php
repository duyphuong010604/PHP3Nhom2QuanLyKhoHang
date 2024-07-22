<?php

use Illuminate\Support\Facades\Route;

Route::get('/inbound', function () {
    return view('inboundShipments.index');
});
Route::get('/inbound/create', function () {
    return view('inboundShipments.create');
});
Route::get('/inbound/update/{id}', function () {
    return view('inboundShipments.edit');
});
