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
    return view('layout');
})->name('trang-chu');

Route::prefix('linhvuc')->group(function(){
	Route::name('linh-vuc.')->group(function(){
		Route::get('/', 'LinhVucController@index')->name('danhsach');
		Route::get('/them-moi', 'LinhVucController@create')->name('them-moi');
		Route::post('/them-moi', 'LinhVucController@store')->name('xl-them-moi');
		Route::get('/update', 'LinhVucController@sua')->name('update');
	});
}); 

Route::get('goi-credit', 'GoiCreditController@index')->name('ds-goi-credit');



