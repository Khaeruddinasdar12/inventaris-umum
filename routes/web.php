<?php


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('data-transaksi', 'Transaksi@get_pernah_pinjam')->name('pernahpinjam');
Route::get('table-pernah-pinjam', 'Transaksi@pernahpinjam')->name('tablepernahpinjam');
Route::Resource('data-barang', 'DataBarang');
	Route::get('tablebarang', 'DataBarang@tablebarang')->name('tablebarang');
	Route::get('tablepeminjaman', 'Transaksi@tablepeminjaman')->name('tablepeminjaman');
	Route::post('data-barang/updatedata', 'DataBarang@updatedata')->name('updatedata');
	
Route::Resource('peminjaman', 'Transaksi');


// Route::post('simpan', 'DataBarang@store');

Route::get('user', 'User@index')->name('user.index');
Route::get('cekstok/{id}', 'Databarang@cekstok');
Route::get('tableuser', 'User@tableuser')->name('tableuser');
Route::group(['middleware' => 'App\Http\Middleware\SuperAdminMiddleware'], function() {
	Route::post('registrasi', 'User@store')->name('registrasi');
	Route::get('user/{id}/edit', 'User@edit');
	Route::delete('user/{id}', 'User@destroy');
	Route::delete('pernahpinjam/{id}', 'Transaksi@hapuspernahpinjam');
	Route::put('user/{id}', 'User@update');
	Route::match(['get','post'], 'coba', 'HomeController@superadmin')->name('coba');
});
// Route::get('coba', 'HomeController@superadmin')->name('coba');