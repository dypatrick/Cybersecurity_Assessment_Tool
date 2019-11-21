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

Route::get('/user', function () {
    return view('user');
});

Route::group(['middleware' => ['auth']], function(){
     /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */

    //index list
    Route::get('/admin', 'AdminController@dashboard');

    /*
    |--------------------------------------------------------------------------
    | User Management Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/user', 'UserController@index');

    /*
    |--------------------------------------------------------------------------
    | Result Management Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/result', 'ResultController@index');
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
