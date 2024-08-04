<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('authentications.signUp');
});

Route::get('/test', function () {
    return view('exports.products-code-pdf', ['products' => Product::all()]);
});

require __DIR__ . "/dashboard.php";
require __DIR__ . "/product.php";
require __DIR__ . "/customer.php";
require __DIR__ . "/inboundShipment.php";
require __DIR__ . "/outboundShipment.php";
require __DIR__ . "/stock.php";
require __DIR__ . "/user.php";