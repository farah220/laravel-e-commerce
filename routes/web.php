<?php

use Illuminate\Support\Facades\Route;
use Rap2hpoutre\FastExcel\FastExcel;
use App\User;
Route::view('/admins/login','auth.admin_login')->name('admins.login-form');
Route::post('/dashboard/login','Auth\\AuthController@dashboardLogin')->name('admins.login');

Route::post('/login','Auth\\AuthController@webLogin')->name('web.login');
Route::post('/register','Auth\\AuthController@register')->name('web.register');
Route::post('/logout','Auth\\AuthController@logout')->name('web.logout');


Route::group(['prefix' => '/', 'as' => 'web.', 'namespace' => 'Web'],function (){
    Route::get('/','HomeController@index')->name('index');

    Route::get('/products/{product}/','HomeController@show')->name('product');
    Route::get('/search','HomeController@search')->name('search');

//    Route::post('/product/','ProductController@store')->name('product.store');
    Route::resource('contact','ContactController')->only(['index','store']);
//    Route::view('/cart','web.cart');
    Route::post('/clear','CartController@clear')->name('cart.clear');
    Route::post('/order','OrderController@createOrder')->name('order.createOrder');
    Route::post('/subscription','SubscriptionController@store')->name('subscription');
    Route::resource('cart','CartController')->only(['index','store','update']);
});
