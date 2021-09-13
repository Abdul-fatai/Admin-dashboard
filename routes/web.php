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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::resource('clients', 'ClientController');

    Route::get('/admin/dashboard', 'Admin\DashboardController@registered');
    Route::get('/admin/clients', 'ClientController@index');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registerededit');
    Route::put('/role-register-update/{id} ', 'Admin\DashboardController@registeredupdate');
    Route::delete('/role-delete/{id}', 'Admin\DashboardController@registereddestroy');
});
