<?php

use Illuminate\Support\Facades\Route;
use Rap2hpoutre\FastExcel\FastExcel;
use App\User;
Route::group(['namespace' => 'Dashboard', 'as' => 'dashboard.', 'middleware' => ['web','auth:admins']],function (){
    Route::view('/','dashboard.index');
    Route::resource('admins','AdminController');
    Route::post('/logout','AdminController@logout')->name('logout');
    Route::resource('users','UserController');

    Route::resource('products','ProductController');
    Route::resource('categories','CategoryController');
    Route::resource('sliders','SliderController');
    Route::resource('contacts','ContactController')->only(['index','show','destroy']);
    Route::resource('subscribers','SubscribersController')->only(['index','show','destroy']);
    Route::get('/export-sub','SubscribersController@exportSubscriber')->name('export.subscribers');


});










