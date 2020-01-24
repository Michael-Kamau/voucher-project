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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin',function(){
//
//    return 'you are admin';
//})->middleware(['auth','auth.admin']);

Route::get('/user', 'HomeController@user')->name('user');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    //Protecting the user route
    Route::get('/user', 'HomeController@user')->name('user');

    //Get all the active vouchers
    Route::get('/api/voucher', 'VoucherController@index');

    ////List a single voucher
    Route::get('api/voucher/{id}', 'VoucherController@show');

    //Buy a Voucher
    Route::post('/api/voucher/buy', 'VoucherController@buy');

    //Give A voucher
    Route::post('api/voucher/give', 'VoucherController@give');

});


//Route::group(['middleware' => 'auth'], function () {
//
//});

