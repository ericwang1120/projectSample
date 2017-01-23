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


Route::group(['middleware' => ['auth']], function () {
    //Accounts
    Route::get('accounts/{id}', 'AccountController@show');
    Route::post('accounts', 'AccountController@store');
    Route::delete('accounts/{id}', 'AccountController@destroy');
    Route::get('accounts/{id}/transactions', 'AccountController@findTransactionsByAccount');

    //Transactions
    Route::post('transactions/accounts/{accountId}', 'TransactionController@store');


    //Users
    Route::get('users/accounts', 'UserController@findAccountsByUser');

});


//Authenticate
Route::post('authenticate', 'AuthenticateController@authenticate');
Route::post('users', 'UserController@store');


//Auth::routes();
//
//Route::get('/home', 'HomeController@index');
