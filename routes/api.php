<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\ShipinfoController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'products',
], function () {
    Route::get('list-product', [ProductController::class, 'index']);  //danh sách sp phân trang
    Route::get('list-product-category/{id}', [ProductController::class, 'show']); //danh sách sp lọc theo danh mục category
    Route::get('item-product/{idPro}', [ProductController::class, 'showItems']); //chi tiết 1 sp
    Route::post('insert-product', [ProductController::class, 'Store']); //thêm 1 sp
    Route::delete('delete-product/{idPro}', [ProductController::class, 'Destroy']); //xóa sp
    Route::put('update-product/{idPro}', [ProductController::class, 'update']); //sửa sp
});

Route::group([
    'prefix' => 'carts',
], function () {
    Route::get('list-cart', [CartController::class, 'index']);  //danh sách sp phân trang
    Route::post('insert-cart', [CartController::class, 'Store']); //thêm 1 sp
    Route::delete('delete-cart', [CartController::class, 'Destroy']); //xóa sp
    Route::delete('delete-cart/{idUser}/{idPro}', [CartController::class, 'Destroy2']); //xóa sp
});

Route::group([
    'prefix' => 'color',
], function () {
    Route::get('list-color', [ColorController::class, 'index']);
    Route::get('list-color-product/{id}', [ColorController::class, 'show']);
    Route::post('insert-color', [ColorController::class, 'Store']);
    Route::delete('delete-color/{id}', [ColorController::class, 'Destroy']);
});

Route::group([
    'prefix' => 'size',
], function () {
    Route::get('list-size', [SizeController::class, 'index']);
    Route::get('list-size-product/{id}', [SizeController::class, 'show']);
    Route::post('insert-size', [SizeController::class, 'Store']);
    Route::delete('delete-size/{id}', [SizeController::class, 'Destroy']);
});

Route::group([
    'prefix' => 'order',
], function () {
    Route::get('list-orders', [OderController::class, 'index']);  //danh sách các đơn hàng phân trang
    Route::get('list-order/{idU}', [OderController::class, 'show']);  //danh sách các đơn hàng của từng khách hàng
    Route::post('insert-order', [OderController::class, 'Store']); //thêm 1 dơn hàng
    Route::put('update-order/{idOrder}', [OderController::class, 'update']); //cập nhật trạng thái đơn hàng
});

Route::group([ //them sua xoa thong tin
    'prefix' => 'shipinfo',
], function () {
    Route::get('list-shipinfo/{id}', [ShipinfoController::class, 'show']);  //danh sách thông tin giao hàng của từng khách hàng
    Route::post('insert-shipinfo', [ShipinfoController::class, 'Store']); 
    Route::delete('delete-shipinfo/{idShip}', [ShipinfoController::class, 'Destroy']); //xoas thông tin giao hàng 
    Route::put('update-shipinfo/{idShip}', [ShipinfoController::class, 'update']); //update thông tin giao hàng
});

