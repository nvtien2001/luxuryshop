<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminIndexController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSlideController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminCollectionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminDecentralizationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// web
Route::get('/', [IndexController::class, 'index']);
Route::get('/logged', [IndexController::class, 'logged']);
Route::get('/shop', [ShopController::class, 'shop']);
Route::get('/shop-search', [ShopController::class, 'shopSearch']);
Route::get('/blog', [BlogController::class, 'blog']);
Route::get('/view-blog', function () {
    return view('front-end.view-blog', ['cate' => 'blog']);
});
Route::get('/checkout', function () {
    return view('front-end.checkout', ['cate' => 'shop']);
});

// Route::get('/shopping-cart', [CartController::class, 'index']);


Route::get('/about', function() {return view('front-end.about',['cate' => 'about']);});
Route::get('/shop-details/{seo}', [ShopController::class, 'detail']);

Route::get('/choose-product-to-cart', [CheckoutController::class, 'choose_product_to_cart']);
Route::get('/test', [TestController::class, 'test']);
Route::get('/shopping-cart', [CheckoutController::class, 'shopping_cart']);
Route::get('/change-product-cart', [CheckoutController::class, 'change_product_cart']);
Route::get('/remove-product', [CheckoutController::class, 'remove_product']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/save-cart', [CheckoutController::class, 'save_cart']);
Route::get('/check-discount', [CheckoutController::class, 'check_discount']);

// admin

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/index', [AdminIndexController::class, 'index']);
    Route::get('/products', [AdminProductController::class, 'view']);
    Route::get('/product-add', [AdminProductController::class, 'viewAdd']);
    Route::get('/product-add/{id}', [AdminProductController::class, 'viewUpdate']);
    Route::get('/product-delete/{id}', [AdminProductController::class, 'delete']);
    Route::post('/product-add', [AdminProductController::class, 'add']);

    Route::get('/categories', [AdminCategoryController::class, 'view']);
    Route::get('/category-add', [AdminCategoryController::class, 'viewAdd']);
    Route::post('/category-add', [AdminCategoryController::class, 'add']);
    Route::get('/categories-delete/{id}', [AdminCategoryController::class, 'delete']);
    Route::get('/categories/{id}', [AdminCategoryController::class, 'viewUpdate']);

    Route::get('/slides', [AdminSlideController::class, 'view']);
    Route::get('/slide-add', [AdminSlideController::class, 'viewAdd']);
    Route::post('/slide-add', [AdminSlideController::class, 'add']);
    Route::get('/slides-delete/{id}', [AdminSlideController::class, 'delete']);
    Route::get('/slides/{id}', [AdminSlideController::class, 'viewUpdate']);

    Route::get('/customers', [AdminCustomerController::class, 'view']);
    Route::get('/customer-delete/{id}', [AdminCustomerController::class, 'delete']);

    Route::get('/collections', [AdminCollectionController::class, 'view']);
    Route::get('/collection-add', [AdminCollectionController::class, 'viewAdd']);
    Route::post('/collection-add', [AdminCollectionController::class, 'add']);
    Route::get('/collection-delete/{id}', [AdminCollectionController::class, 'delete']);
    Route::get('/collections/{id}', [AdminCollectionController::class, 'viewUpdate']);

    Route::get('/decentralization', [AdminDecentralizationController::class, 'view']);
    Route::get('/decentralization-delete/{id}', [AdminDecentralizationController::class, 'delete']);
    Route::get('/decentralization-add', [AdminDecentralizationController::class, 'viewAdd']);
    Route::post('/decentralization-add', [AdminDecentralizationController::class, 'add']);

    Route::get('/orders', [AdminOrderController::class, 'view']);
    Route::get('/order-delete/{id}', [AdminOrderController::class, 'delete']);
    Route::get('/order-update/{id}', [AdminOrderController::class, 'update']);
    Route::get('/orders-done', [AdminOrderController::class, 'view1']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
