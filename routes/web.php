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

Route::get('/', function () 
{
    return view('cyber-home');
});

Route::get('/cyber-home', function () 
{
    return view('cyber-home');
});

Route::get('/welcome', function () 
{
    return view('welcome');
});

Route::get('/cyber-about', function () 
{
    return view('cyber-about');
});

Route::get('/user', function () 
{
    return view('user');
});
Route::get('/user/{user}/edit', 'UserController@edit');
Route::patch('/user', 'UserController@update');
Route::get('/cyber-test', function () 
{
    return view('cyber-test');
});

Route::get('/cyber-contact', function () 
{
    return view('cyber-contact');
});

Route::get('/cyber-resources', function () 
{
    return view('cyber-resources');
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
    Route::get('/user/{user}', 'UserController@show');
    /*
    |--------------------------------------------------------------------------
    | Result Management Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/result', 'ResultController@index');
    Route::get('/result/{result}', 'ResultController@show');

    //Excel Controller
    Route::get('/export', 'ExcelController@export');

});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/cyber-home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
