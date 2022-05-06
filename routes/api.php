<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\ShipinfoController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\WishListController;
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
    Route::post('signup', [AuthController::class, 'register']);
    Route::group([
        'middleware' => ['auth:sanctum']
    ], function () {
    
        Route::delete('logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'user']);
        Route::put('changePassword', [AuthController::class, 'changePass']);

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
/*
|--------------------------------------------------------------------------
| Wish List
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'wishlist',
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('list/{id}', [WishListController::class, 'index']);  
    Route::post('insert', [WishListController::class, 'store']); 
    Route::delete('delete/{idUser}/{idPro}', [WishListController::class, 'destroy']); 
});  


/*
|--------------------------------------------------------------------------
| Comment
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'comment',
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('list-comment/{id}', [CommentController::class, 'index']);  
    Route::post('insert-comment', [CommentController::class, 'store']); 
});  

/*
|--------------------------------------------------------------------------
| System Info
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'System-Inf',
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('list-Inf', [InfoController::class, 'index']);  
    Route::put('update-Inf', [InfoController::class, 'update']); 
});  
/*
|--------------------------------------------------------------------------
| Category
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'Category',
    // 'middleware' => ['auth:sanctum']
], function () {
    Route::get('list', [CategoryController::class, 'index']);  
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
    Route::get('insert-color-pro', [ProductController::class, 'StoreColPro']);
    Route::post('insert-color-product', [ProductController::class, 'insertColPro']); //thêm color cho sp
    Route::post('insert-size-product', [ProductController::class, 'insertSizePro']); //thêm size cho sp
    Route::delete('delete-color-product/{idP}', [ProductController::class, 'deleteColPro']); //xóa sp
    Route::delete('delete-size-product/{idP}', [ProductController::class, 'deleteSizePro']); //xóa sp
    Route::post('update-color-product/{idP}', [ProductController::class, 'updatetColPro']); //thêm color cho sp
    Route::post('update-size-product/{idP}', [ProductController::class, 'updatetSizePro']); //thêm size cho sp
});

Route::group([
    'prefix' => 'carts',
], function () {
    Route::get('list-cart/{id}', [CartController::class, 'index']);  //lấy giỏ hàng theo id user
    Route::post('insert-cart', [CartController::class, 'Store']); //thêm 1 sp
    Route::delete('delete-cart', [CartController::class, 'Destroy']); //xóa sp
    Route::delete('delete-cart/{idUser}/{idPro}', [CartController::class, 'Destroy2']); //xóa sp
    Route::delete('delete-all-cart/{idUser}', [CartController::class, 'DeleteAll']);
    Route::put('update-number-cart', [CartController::class, 'updateCart']); //update so luong gio hàng
    Route::get('count-list-cart/{idUser}', [CartController::class, 'countListCart']);
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
    Route::get('list-orders/{id}', [OderController::class, 'FilterID']);  //danh sách các đơn hàng phân trang
    Route::get('list-order/{idOrder}', [OderController::class, 'show']);  //chi tiết các sp của 1 đơn hàng
    Route::get('list-order-user/{idU}', [OderController::class, 'listOrder']);  //danh sách đơn hàng của 1 khách hangf
    Route::post('insert-order', [OderController::class, 'Store']); //thêm 1 dơn hàng
    Route::put('update-order/{idOrder}', [OderController::class, 'update']); //cập nhật trạng thái đơn hàng
    Route::post('insert-order-product', [OderController::class, 'storeProductInOrder']); //Thêm sản phẩm vào đơn hàng
});

Route::group([ //them sua xoa thong tin
    'prefix' => 'shipinfo',
], function () {
    Route::get('list-shipinfo/{id}', [ShipinfoController::class, 'show']);  //danh sách thông tin giao hàng của từng khách hàng
    Route::get('item-shipinfo/{id}', [ShipinfoController::class, 'showItem']);  //danh sách thông tin giao hàng của từng khách hàng
    Route::post('insert-shipinfo', [ShipinfoController::class, 'Store']); 
    Route::delete('delete-shipinfo/{idShip}', [ShipinfoController::class, 'Destroy']); //xoas thông tin giao hàng 
    Route::put('update-shipinfo/{idShip}', [ShipinfoController::class, 'update']); //update thông tin giao hàng
});

Route::group([ //them sua xoa thong tin
    'prefix' => 'category',
], function () {
    Route::get('list-category', [CategoryController::class, 'show']);  //danh sách thông tin giao hàng của từng khách hàng
});

