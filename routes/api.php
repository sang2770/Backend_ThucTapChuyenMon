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
use App\Http\Controllers\UserController;
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
     'middleware' => ['auth:sanctum']
], function () {
    Route::get('list', [CategoryController::class, 'index']);  
});  

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'customer',
], function () {
    Route::get('list-customer', [UserController::class, 'index']);  //danh s??ch sp ph??n trang
});

Route::group([
    'prefix' => 'products',
], function () {
    Route::get('list-product', [ProductController::class, 'index']);  //danh s??ch sp ph??n trang
    Route::get('list-product-category/{id}', [ProductController::class, 'show']); //danh s??ch sp l???c theo danh m???c category
    Route::get('item-product/{idPro}', [ProductController::class, 'showItems']); //chi ti???t 1 sp
    Route::post('insert-product', [ProductController::class, 'Store']); //th??m 1 sp
    Route::delete('delete-product/{idPro}', [ProductController::class, 'Destroy']); //x??a sp
    Route::put('update-product/{idPro}', [ProductController::class, 'update']); //s???a sp
    Route::get('insert-color-pro', [ProductController::class, 'StoreColPro']);
    Route::post('insert-color-product', [ProductController::class, 'insertColPro']); //th??m color cho sp
    Route::post('insert-size-product', [ProductController::class, 'insertSizePro']); //th??m size cho sp
    Route::delete('delete-color-product/{idP}', [ProductController::class, 'deleteColPro']); //x??a sp
    Route::delete('delete-size-product/{idP}', [ProductController::class, 'deleteSizePro']); //x??a sp
    Route::post('update-color-product/{idP}', [ProductController::class, 'updatetColPro']); //th??m color cho sp
    Route::post('update-size-product/{idP}', [ProductController::class, 'updatetSizePro']); //th??m size cho sp
    Route::put('update-number-product', [ProductController::class, 'updateNumber']);
    
});

Route::group([
    'prefix' => 'carts',
], function () {
    Route::get('list-cart/{id}', [CartController::class, 'index']);  //l???y gi??? h??ng theo id user
    Route::post('insert-cart', [CartController::class, 'Store']); //th??m 1 sp
    Route::delete('delete-cart', [CartController::class, 'Destroy']); //x??a sp
    Route::delete('delete-cart/{idUser}/{idPro}', [CartController::class, 'Destroy2']); //x??a sp
    Route::delete('delete-all-cart/{idUser}', [CartController::class, 'DeleteAll']);
    Route::put('update-number-cart', [CartController::class, 'updateCart']); //update so luong gio h??ng
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
    Route::get('list-orders', [OderController::class, 'index']);  //danh s??ch c??c ????n h??ng ph??n trang
    Route::get('list-orders/{id}', [OderController::class, 'FilterID']);  //danh s??ch c??c ????n h??ng ph??n trang
    Route::get('list-order/{idOrder}', [OderController::class, 'show']);  //chi ti???t c??c sp c???a 1 ????n h??ng
    Route::get('list-order-user/{idU}', [OderController::class, 'listOrder']);  //danh s??ch ????n h??ng c???a 1 kh??ch hangf
    Route::post('insert-order', [OderController::class, 'Store']); //th??m 1 d??n h??ng
    Route::put('update-order/{idOrder}', [OderController::class, 'update']); //c???p nh???t tr???ng th??i ????n h??ng
    Route::post('insert-order-product', [OderController::class, 'storeProductInOrder']); //Th??m s???n ph???m v??o ????n h??ng
});

Route::group([ //them sua xoa thong tin
    'prefix' => 'shipinfo',
], function () {
    Route::get('list-shipinfo/{id}', [ShipinfoController::class, 'show']);  //danh s??ch th??ng tin giao h??ng c???a t???ng kh??ch h??ng
    Route::get('item-shipinfo/{id}', [ShipinfoController::class, 'showItem']);  //danh s??ch th??ng tin giao h??ng c???a t???ng kh??ch h??ng
    Route::post('insert-shipinfo', [ShipinfoController::class, 'Store']); 
    Route::delete('delete-shipinfo/{idShip}', [ShipinfoController::class, 'Destroy']); //xoas th??ng tin giao h??ng 
    Route::put('update-shipinfo/{idShip}', [ShipinfoController::class, 'update']); //update th??ng tin giao h??ng
});

Route::group([ //them sua xoa thong tin
    'prefix' => 'category',
], function () {
    Route::get('list-category', [CategoryController::class, 'show']);  
    Route::post('insert-category', [CategoryController::class, 'Store']);
    Route::delete('delete-category/{id}', [CategoryController::class, 'Destroy']);
});

