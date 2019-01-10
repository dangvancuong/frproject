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
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/alladmin', function () {
    return view('admin.control.table_user');
});
Route::get('/map', function () {
    return view('admin.control.map');
});
Route::get('/khoangcach', function () {
    return view('admin.control.khoangcach');
});
//Route::get('/', 'HomeController@index')->name('trangchu');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
