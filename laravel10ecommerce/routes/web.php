<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ContactUSController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppController::class, 'index'])->name('app.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ShopController::class, 'productDetails'])->name('shop.product.details');
Route::get('/cart-wishlist-count', [ShopController::class,'getCartAndWishlistCount'])->name('shop.cart.wishlist.count');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


Route::get('/wishlist', [WishListController::class, 'getWishlistedProducts'])->name('wishlist.list');
Route::post('/wishlist/add', [WishListController::class, 'addProductToWishlist'])->name('wishlist.store');
Route::delete('/wihlist/remove', [WishListController::class, 'removeProductFromWishlist'])->name('wishlist.remove');
Route::delete('/wihlist/clear', [WishListController::class, 'clearWishlist'])->name('wishlist.clear');

Route::post('/categories/add', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::post('/products/add', [ProductController::class, 'store'])->name('products.store');
Route::post('/products/page', [ProductController::class, 'page'])->name('products.page');
Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/update/{category}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');


Route::put('/users/update', [AdminController::class, 'update'])->name('admin.users.update');

Route::get('/contact-us', [ContactUSController::class, 'index'])->name('contact.index');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.index');


Route::post('/brand/add', [BrandController::class, 'store'])->name('brands.store');
Route::delete('/brand/delete/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');

Route::get('/check-out', [CheckOutController::class, 'index'])->name('check.index');

Route::middleware(['auth'])->group(function () {
    Route::post('/place-order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/success/{transactionId}', [OrderController::class, 'success'])->name('order.success');
});

Route::put('/admin/orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');

Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');







Auth::routes();

Route::middleware('auth')-> group(function(){
    Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
});

Route::middleware(['auth', 'auth.admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});


// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//     ->name('logout');
