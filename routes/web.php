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


Route::get('/admin',function(){

    return view('adminView');
})->middleware(['auth','auth.admin']);

//Route::get('/home', 'HomeController@index')->name('home');

//Fetching the vouchers for a particular user from the db
Route::get('/userVouchers/{id}','VoucherController@userVouchers'

)->middleware(['auth','auth.admin']);

//Fetching all the users from the db
Route::get('/users/all','VoucherController@usersAll'

)->middleware(['auth','auth.admin']);

//Adding vouchers
Route::post('/api/voucher/generate','VoucherController@generate');//->middleware(['auth','auth.admin']);

Route::get('/user', 'HomeController@user')->name('user');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    //Protecting the user route
    Route::get('/user', 'HomeController@user')->name('user');

    //Get all the active vouchers
    Route::get('/api/voucher/', 'VoucherController@index');

    ////List  voucher
    Route::get('api/voucher/{status}', 'VoucherController@show');

    //Buy a Voucher
    Route::post('/api/voucher/buy', 'VoucherController@buy');

    //Give A voucher
    Route::post('api/voucher/give', 'VoucherController@give');

    //Claim A voucher
    Route::post('api/voucher/claim', 'VoucherController@claim');

    //Redeem A voucher
    Route::post('api/voucher/redeem', 'VoucherController@redeem');

    //Check the role of a user
    Route::get('user/role', 'HomeController@role');

});

Route::get('logout', function(){
    return redirect('/')-> with(Auth::logout());
});


//Route::group(['middleware' => 'auth'], function () {
//
//});

