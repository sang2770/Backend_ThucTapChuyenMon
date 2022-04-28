<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Auth Admin
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'auth/admin'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::group([
        'middleware' => ['auth:sanctum']
    ], function () {
    Route::post('signup', [AuthController::class, 'register']);
        Route::delete('logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'user']);
    });
});
/*
|--------------------------------------------------------------------------
| Auth User
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'auth/user'
], function () {
    Route::post('login', [AuthUserController::class, 'login']);
    Route::post('signup', [AuthUserController::class, 'register']);
    Route::group([
        'middleware' => ['auth:sanctum']
    ], function () {
        Route::delete('logout', [AuthUserController::class, 'logout']);
        Route::get('me', [AuthUserController::class, 'user']);
    });
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


