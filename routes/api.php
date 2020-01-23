<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//List all the vouchers

Route::get('voucher','VoucherController@index');

//List a single voucher
Route::get('voucher/{id}','VoucherController@show');


//Create a new voucher
Route::post('voucher','VoucherController@store');

//update voucher
Route::put('voucher','VoucherController@store');

//Delete an article
Route::delete('voucher','VoucherController@store');
