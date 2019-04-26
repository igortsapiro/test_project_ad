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

Route::get('/', 'IndexController@index')->name('index');

/**
 * Auth routes
 */
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Ad routes
 */
Route::group(['middleware' => 'isAuth'], function () {
    Route::get('edit', 'AdController@edit')->name('ad.edit');
    Route::get('edit/{ad}', 'AdController@edit')->name('ad.edit')->middleware('isOwnerAd');
    Route::post('update', 'AdController@update')->name('ad.update');
    Route::post('update/{ad}', 'AdController@update')->name('ad.update')->middleware('isOwnerAd');
    Route::delete('delete/{ad}', 'AdController@destroy')->name('ad.delete')->middleware('isOwnerAd');
    Route::get('{ad}', 'AdController@show')->name('ad.show');
});
