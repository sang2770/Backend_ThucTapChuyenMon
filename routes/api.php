<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    Route::post('insert-product', [ProductController::class, 'insert']); //thêm 1 sp
    Route::delete('delete-product/{idPro}', [ProductController::class, 'delete']); //xóa sp
    Route::put('update-product/{idPro}', [ProductController::class, 'update']); //sửa sp
});


