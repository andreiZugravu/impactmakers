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

Route::get('/', ['as'=>'index', 'uses'=>'HomeController@index']);


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/test', function () {
        return view('admin.main');
    });

    Route::get('/institutions', [
        'uses' => 'InstitutionsController@index',
        'as' => 'institutions.index'
    ]);

    Route::post('/institutions/{institution}', [
        'uses' => 'InstitutionsController@update',
        'as' => 'institutions.update'
    ]);

    Route::get('/institution-types', 'InstitutionTypeController@index')->name('institution-types-index');
    Route::get('/institution-types/create', 'InstitutionTypeController@create')
    ->name('institution-types-create');
    Route::post('/institution-types/store', 'InstitutionTypeController@store')
    ->name('institution-types-store');
});


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', ['as'=>'map', 'uses'=>'MapController@index']);
