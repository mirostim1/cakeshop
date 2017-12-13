<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function(){
    return view('home.index');
})->name('home');

Route::get('logout', function(){
    Auth::logout();
    return redirect()->back();
});

Route::get('/about', function(){
    return view('about.index');
})->name('about');

Route::get('/contact', function(){
    return view('contact.index');
})->name('contact');

Auth::routes();

Route::resource('/products', 'ProductsController', ['names' => [
    'index'    => 'products.index',
    'products' => 'products.show'
]]);

Route::post('/products', 'ProductsController@sort')->name('products.sort');

Route::resource('/orders', 'OrdersController', ['names' => [
    'index'  => 'orders.index'
]]);

Route::get('/product/{slug}', 'ProductsController@product')->name('product.index');

Route::resource('/cart', 'CartController', ['names' => [
    'cart'   => 'cart.index'
]]);

Route::post('update/cart', 'CartController@updateCart');
Route::delete('update/cart', 'CartController@deleteCart');

Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('/admin/users', 'AdminUsersController', ['names' => [
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'edit'    => 'admin.users.edit'
    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names' => [
        'index'   => 'admin.categories.index',
        'create'  => 'admin.categories.create',
        'edit'    => 'categories.edit'
    ]]);

    Route::resource('/admin/products', 'AdminProductsController', ['names' => [
        'index'   => 'admin.products.index',
        'create'  => 'admin.products.create',
        'edit'    => 'admin.products.edit'
    ]]);

    Route::delete('admin/delete/products', 'AdminProductsController@deleteProducts');

    Route::resource('/admin/media', 'AdminMediaController', ['names' => [
        'index'   => 'admin.media.index',
        'create'  => 'admin.media.create'
    ]]);

    Route::delete('admin/delete/media', 'AdminMediaController@deleteMedia');

    Route::resource('/admin/orders', 'AdminOrdersController', ['names' => [
        'index'   => 'admin.orders.index'
    ]]);

    Route::delete('admin/delete/orders', 'AdminOrdersController@deleteOrders');

});
