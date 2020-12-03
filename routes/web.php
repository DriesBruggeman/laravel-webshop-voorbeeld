<?php

use Illuminate\Support\Facades\Request;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'StoreController@index');

Route::prefix('store')->group(function (){
    Route::get('/product/{id}', 'StoreController@Showproduct')->where('id', '[0-9]+')->name('viewProduct');

    Route::get('/', 'StoreController@Storefront')->name('store');

    Route::get('/category/{id}', 'StoreController@FilterCategories')->where('id', '[0-9]+');

    Route::post('/product/review', 'StoreController@LeaveReview')->middleware('can:leave-review')->name('leaveReview');

    Route::post('/product/review/delete', 'StoreController@DeleteOwnReview')->name('deleteOwnReview')->middleware(['auth', 'can:delete-own-reviews']);

    Route::get('/checkout', 'CheckoutController@Checkout')->name('checkout');

    Route::delete('/product/review/delete', 'StoreController@DeleteReview')->name('deleteReview')->middleware(['auth', 'can:delete-reviews']);
});

Route::prefix('order')->group(function(){
    Route::get('/view', 'OrderController@ViewOrders')->name('viewOrders');
    Route::post('/place', 'OrderController@PlaceOrder')->name('placeOrder')->middleware('checkCart');
});

Route::prefix('cart')->group(function (){
    Route::get('/{id}/{amount}/add', 'CartController@AddToCart')->where(['id' => '[0-9]+', 'amount' => '[0-9]+'])->name('addToCart');

    Route::get('/{id}/{amount}/remove', 'CartController@RemoveFromCart')->where(['id', '[0-9]+', 'amount' => '[0-9]+'])->name('removeFromCart');

    Route::get('/view', 'CartController@ViewCart')->name('viewCart');
});

Route::prefix('address')->group(function(){
    Route::patch('/address/update', 'AddressController@updateAddress')->name('updateAddress');
    Route::post('/address/create', 'AddressController@createAddress')->name('createAddress');

    Route::patch('/shippingaddress/update', 'AddressController@updateShippingAddress')->name('updateShippingAddress');
    Route::post('/shippingaddress/create', 'AddressController@createShippingAddress')->name('createShippingAddress');
    Route::delete('/shippingaddress/remove', 'AddressController@removeShippingAddress')->name('removeShippingAddress');
});

Route::prefix('admin')->group(function (){
    Route::prefix('store')->group(function (){
        Route::get('/product/create', 'ProductController@Createproductform')->name('createProductForm');
        Route::post('/product/create', 'ProductController@Createproduct')->name('createProduct');

        Route::get('/product/{id}/edit', 'ProductController@Editproductform')->where('id', '[0-9]+')->name('editProductform');
        Route::patch('/product/edit', 'ProductController@Editproduct')->name('editProduct');

        Route::get('/product/{id}/delete', 'ProductController@Deleteproductform')->where('id', '[0-9]+')->name('deleteProductform');
        Route::delete('/product/delete', 'ProductController@Deleteproduct')->name('deleteProduct');
    });
});

//Debug unset cart
Route::get('/unset', 'HomeController@unset');

Route::get('/logout/confirm', 'HomeController@ConfirmLogout')->name('confirmLogout')->middleware('auth');
Auth::routes();
