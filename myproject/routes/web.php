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
Route::middleware('auth')->group(function(){
	Route::get('/', function (){
    	return view('layout');
	})->name('trang-chu');

	Route::prefix('linhvuc')->group(function(){
		Route::name('linh-vuc.')->group(function(){
			Route::get('/', 'LinhVucController@index')->name('danhsach')	;
			Route::get('/them-moi', 'LinhVucController@create')->name('them-moi');
			Route::post('/them-moi', 'LinhVucController@store')->name('xl-them-moi');
			Route::get('/update/{id}', 'LinhVucController@edit')->name('edit');
			Route::post('/update', 'LinhVucController@update')->name('update');
			Route::delete('/xoa/{id}', 'LinhVucController@destroy')->name('xoa');
		});
	});
});

	Route::prefix('goicredit')->group(function(){
		Route::name('goi-credit.')->group(function(){
			Route::get('/', 'GoiCreditController@index')->name('ds-goi-credit');
			Route::get('/them-moi', 'GoiCreditController@create')->name('them-moi');
			Route::post('/them-moi', 'GoiCreditController@store')->name('xl-them-moi');
		});
	});
Route::get('cau-hoi', 'CauHoiController@index')->name('ds-cauhoi');
Route::get('dang-nhap', 'QuanTriVienController@dangNhap')->name('dang-nhap');
Route::get('dang-xuat', 'QuanTriVienController@dangXuat')->name('dang-xuat');
Route::post('dang-nhap', 'QuanTriVienController@xuLyDangNhap')->name('xu-ly-dang-nhap');



