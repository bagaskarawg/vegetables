<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::group(['prefix' => config('site.adminURI')], function () {

	get('/', ['as' => 'home', 'uses' => 'Home@index']);

	/* Pengguna */
	get('/change-password', [
		'as' => 'ganti-pass',
		'uses' => 'UserController@change_password'
	]);

	post('/change-password', [
		'as' => 'ganti-pass',
		'uses' => 'UserController@apply_changes'
	]);

	get('/pengguna', [
		'as' => 'pengguna',
		'uses' => 'UserController@index'
	]);

	get('/pengguna/tambah', [
		'as' => 'tambah-pengguna',
		'uses' => 'UserController@create'
	]);

	post('/pengguna/tambah', [
		'as' => 'tambah-pengguna',
		'uses' => 'UserController@store'
	]);

	get('/pengguna/edit/{id}', [
		'as' => 'edit-pengguna',
		'uses' => 'UserController@edit'
	]);

	post('/pengguna/edit/{id}', [
		'as' => 'edit-pengguna',
		'uses' => 'UserController@update'
	]);

	get('/pengguna/hapus/{id}', [
		'as' => 'hapus-pengguna',
		'uses' => 'UserController@destroy'
	]);
	/* Pengguna */

	/* Foodhall */
	get('/foodhall', [
		'as' => 'foodhall',
		'uses' => 'FoodhallController@index'
	]);

	get('/foodhall/tambah', [
		'as' => 'tambah-foodhall',
		'uses' => 'FoodhallController@create'
	]);

	post('/foodhall/tambah', [
		'as' => 'tambah-foodhall',
		'uses' => 'FoodhallController@store'
	]);

	get('/foodhall/edit/{id}', [
		'as' => 'edit-foodhall',
		'uses' => 'FoodhallController@edit'
	]);

	post('/foodhall/edit/{id}', [
		'as' => 'edit-foodhall',
		'uses' => 'FoodhallController@update'
	]);

	get('/foodhall/hapus/{id}', [
		'as' => 'hapus-foodhall',
		'uses' => 'FoodhallController@destroy'
	]);
	/* Foodhall */

	/* Sayur */
	get('/sayur', [
		'as' => 'sayur',
		'uses' => 'SayurController@index'
	]);

	get('/sayur/tambah', [
		'as' => 'tambah-sayur',
		'uses' => 'SayurController@create'
	]);

	post('/sayur/tambah', [
		'as' => 'tambah-sayur',
		'uses' => 'SayurController@store'
	]);

	get('/sayur/edit/{id}', [
		'as' => 'edit-sayur',
		'uses' => 'SayurController@edit'
	]);

	post('/sayur/edit/{id}', [
		'as' => 'edit-sayur',
		'uses' => 'SayurController@update'
	]);

	get('/sayur/delete/{id}', [
		'as' => 'hapus-sayur',
		'uses' => 'SayurController@destroy'
	]);
	/* Sayur */

	/* Supplier */
	get('/supplier', [
		'as' => 'supplier',
		'uses' => 'SupplierController@index'
	]);

	get('/supplier/tambah', [
		'as' => 'tambah-supplier',
		'uses' => 'SupplierController@create'
	]);

	post('/supplier/tambah', [
		'as' => 'tambah-supplier',
		'uses' => 'SupplierController@store'
	]);

	get('/supplier/edit/{id}', [
		'as' => 'edit-supplier',
		'uses' => 'SupplierController@edit'
	]);

	post('/supplier/edit/{id}', [
		'as' => 'edit-supplier',
		'uses' => 'SupplierController@update'
	]);

	get('/supplier/hapus/{id}', [
		'as' => 'hapus-supplier',
		'uses' => 'SupplierController@destroy'
	]);
	/* Supplier */

	/* Supply Sayur */
	get('/supply-sayur', [
		'as' => 'supply-sayur',
		'uses' => 'SupplySayurController@index'
	]);

	get('/supply-sayur/tambah', [
		'as' => 'tambah-supply-sayur',
		'uses' => 'SupplySayurController@create'
	]);

	post('/supply-sayur/tambah', [
		'as' => 'tambah-supply-sayur',
		'uses' => 'SupplySayurController@store'
	]);

	get('/supply-sayur/edit/{id}', [
		'as' => 'edit-supply-sayur',
		'uses' => 'SupplySayurController@edit'
	]);

	post('/supply-sayur/edit/{id}', [
		'as' => 'edit-supply-sayur',
		'uses' => 'SupplySayurController@update'
	]);

	get('/supply-sayur/hapus/{id}', [
		'as' => 'hapus-supply-sayur',
		'uses' => 'SupplySayurController@destroy'
	]);
	/* Supply Sayur */

	/* Penjualan */
	get('/penjualan', [
		'as' => 'penjualan',
		'uses' => 'PenjualanController@index'
	]);

	get('/penjualan/detail/{id}', [
		'as' => 'detail-penjualan',
		'uses' => 'PenjualanController@show'
	]);

	get('/penjualan/tambah', [
		'as' => 'tambah-penjualan',
		'uses' => 'PenjualanController@create'
	]);

	post('/penjualan/tambah', [
		'as' => 'tambah-penjualan',
		'uses' => 'PenjualanController@store'
	]);
	/* Penjualan */

	/* Goods Receipt */
	get('/goods-receipt', [
		'as' => 'goods-receipt',
		'uses' => 'GoodsReceiptController@index'
	]);

	get('/goods-receipt/detail/{id}', [
		'as' => 'detail-gr',
		'uses' => 'GoodsReceiptController@show'
	]);

	get('/goods-receipt/tambah/{id?}', [
		'as' => 'tambah-gr',
		'uses' => 'GoodsReceiptController@create'
	]);

	post('/goods-receipt/tambah/{id?}', [
		'as' => 'tambah-gr-post',
		'uses' => 'GoodsReceiptController@store'
	]);

	get('/goods-receipt/update/{id}', [
		'as' => 'edit-gr',
		'uses' => 'GoodsReceiptController@edit'
	]);

	post('/goods-receipt/update/{id}', [
		'as' => 'edit-gr-post',
		'uses' => 'GoodsReceiptController@update'
	]);
	/* Goods Receipt */

	/* Tagihan */
	get('/tagihan', [
		'as' => 'tagihan',
		'uses' => 'TagihanController@index'
	]);

	get('/tagihan/detail/{id}', [
		'as' => 'detail-tagihan',
		'uses' => 'TagihanController@show'
	]);

	get('/tagihan/tambah/{id?}', [
		'as' => 'tambah-tagihan',
		'uses' => 'TagihanController@create'
	]);

	post('/tagihan/tambah/{id?}', [
		'as' => 'tambah-tagihan-post',
		'uses' => 'TagihanController@store'
	]);

	// get('/tagihan/update/{id}', [
	// 	'as' => 'edit-tagihan',
	// 	'uses' => 'TagihanController@edit'
	// ]);

	// post('/tagihan/update/{id}', [
	// 	'as' => 'edit-tagihan-post',
	// 	'uses' => 'TagihanController@update'
	// ]);
	/* Tagihan */

	/* Laporan */
	get('/laporan/mingguan', [
		'as' => 'laporan-mingguan',
		'uses' => 'LaporanController@index'
	]);

	get('/detail-laporan/mingguan/{id}', [
		'as' => 'detail-laporan-mingguan',
		'uses' => 'LaporanController@mingguan_detail'
	]);

	get('/laporan/bulanan', [
		'as' => 'laporan-bulanan',
		'uses' => 'LaporanController@bulanan'
	]);
	

	get('/detail-laporan/bulanan/{id}', [
		'as' => 'detail-laporan-bulanan',
		'uses' => 'LaporanController@bulanan_detail'
	]);
	/* Laporan */

	/* Jadwal */
	get('/jadwal', [
		'as' => 'jadwal',
		'uses' => 'JadwalController@index'
	]);

	get('/jadwal/edit/{id}', [
		'as' => 'edit-jadwal',
		'uses' => 'JadwalController@edit'
	]);

	post('/jadwal/edit/{id}', [
		'as' => 'edit-jadwal-post',
		'uses' => 'JadwalController@update'
	]);
	/* Jadwal */

	Route::controllers([
		'auth' => 'Members\AuthController',
		'password' => 'Members\PasswordController',
	]);

});