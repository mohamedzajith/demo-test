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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/telephone/filter-data', 'TelephoneController@filterData')->name('telephone.filter');
    Route::resource('/telephone', 'TelephoneController', [
        'names' => [
            'index' => 'telephone',
            'create' => 'telephone.create',
            'store' => 'telephone.store',
            'edit' => 'telephone.edit',
            'update' => 'telephone.update',
            'delete' => 'telephone.delete'
        ]
    ]);
});
