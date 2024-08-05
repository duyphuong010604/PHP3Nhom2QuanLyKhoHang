<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('authentications.SignIn');
});

Route::middleware(['auth.check'])->group(function () {
    // Các route yêu cầu đăng nhập
    require __DIR__ . "/dashboard.php";
    require __DIR__ . "/product.php";
    require __DIR__ . "/customer.php";
    require __DIR__ . "/inboundShipment.php";
    require __DIR__ . "/outboundShipment.php";
    require __DIR__ . "/stock.php";
    require __DIR__ . "/user.php"; 
});