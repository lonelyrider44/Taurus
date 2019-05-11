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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('users','UsersController@index')->name('users.index');
    Route::post('ajax/users/get', 'UsersController@getUsersAjax')->name('ajax.users.index');
    Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::get('users/destroy/{id}', 'UsersController@destroy')->name('users.destroy.get');
    
    Route::resource('reports', 'ReportsController')->middleware('auth');
    Route::post('reports.datatable', 'ReportsController@datatable')->name('reports.datatable');
    Route::get('reports/{user}', 'ReportsController@indexUser')->name('reports.index.user');
    Route::get('reports/delete/{report}', 'ReportsController@destroy')->name('reports.destroy.get');
    
    Route::get('reports/show/{report}/pdf', 'ReportsController@showPDF')->middleware('auth')->name('reports.show.pdf');
    Route::post('reports/searchResult', 'ReportsController@search')->middleware('auth')->name('reports.search');   

    Route::get('ajax/reports/updateInfo', 'ReportsController@updateInfo')->middleware('auth')->name('ajax.reports.updateInfo');
});