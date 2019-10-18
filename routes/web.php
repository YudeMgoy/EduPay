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

Route::get('/','HomeController@index');
Auth::routes();
Route::get('akun','HomeController@akun');
Route::view('topup', 'public.topup');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['']], function () {
    
});

Route::get('logout','HomeController@logout');

Route::post('edit/keranjang','BeliController@EditKeranjang');
Route::get('list/barang','BeliController@ListBarang')->name('jualan');
Route::get('keranjang','BeliController@IsiKeranjang')->name('viewkeranjang');
Route::post('add/keranjang/{id}','BeliController@MasukanBarang')->name('keranjang');
Route::get('hapus/barang/{id}','BeliController@DeleteListBarang');
Route::get('hapus/keranjang/list','BeliController@CancelBeli');
Route::post('prosess/beli','BeliController@Prosess');
Route::get('list/pesanan','BeliController@listPesan');
Route::get('detail/pesanan/{id}','BeliController@detailprosess');
Route::get('detail/barang/{id}', 'BeliController@detailBarang');
// Route::middleware('CekRole')->group(function () {

//     Route::get('add/list/barang','ManageBarangController@add');
// });

// Route::get('add/list/barang','ManageBarangController@add');

Route::middleware('auth')->group(function(){
    Route::middleware('CekRole')->group(function(){
        Route::get('view/all/barang','ManageBarangController@index');
        Route::get('add/list','ManageBarangController@add');
        Route::post('add/barang','ManageBarangController@create')->name('addbarang');
        Route::get('view/list','AdminController@index');
        Route::get('delete/item/{id}','ManageBarangController@hapus');
        Route::post('edit/item','ManageBarangController@edit')->name('editbarang');
        Route::get('edit/view/{id}','ManageBarangController@editview');
    });
    Route::middleware('isGudang')->group(function(){
        Route::get('gudang/list','GudangController@index');
    });

    
});
