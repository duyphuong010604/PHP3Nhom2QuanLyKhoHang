<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('authentications.signIn');
});

Route::get('/trang-chu.index', function () {
    return view('trang-chu.index');
})->middleware(['auth', 'verified'])->name('trang-chu.index');
Route::middleware('auth')->group(function () {
    // ae bỏ trang route index của các sản phẩm .... vào nhé
});
    // Các route yêu cầu đăng nhập
    require __DIR__ . "/dashboard.php";
    require __DIR__ . "/product.php";
    require __DIR__ . "/customer.php";
    require __DIR__ . "/inboundShipment.php";
    require __DIR__ . "/outboundShipment.php";
    require __DIR__ . "/stock.php";
    require __DIR__ . "/user.php"; 
