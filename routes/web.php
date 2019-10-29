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
Route::group(['middleware' => ['']], function () {
    
});
Auth::routes();
Route::get('logout','HomeController@logout');

Route::middleware('auth')->group(function(){
    Route::get('promo/{id}','PromosiController@detail');
    Route::post('ganti/password','AkunController@changePassword');
    Route::post('ganti/nama','AkunController@gantiNama');
    Route::get('/','HomeController@index');
    Route::get('akun','HomeController@akun');
    Route::view('topup', 'public.topup');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('ganti/foto','AkunController@ganti_profil');
    Route::post('edit/keranjang','BeliController@EditKeranjang');
    Route::post('search/barang','BeliController@search');
    Route::get('list/barang','BeliController@ListBarang')->name('jualan');
    Route::get('list/barang/{id}','BeliController@Listkategori');
    Route::get('keranjang','BeliController@IsiKeranjang')->name('viewkeranjang');
    Route::post('add/keranjang/{id}','BeliController@MasukanBarang')->name('keranjang');
    Route::get('hapus/barang/{id}','BeliController@DeleteListBarang');
    Route::get('hapus/keranjang/list','BeliController@CancelBeli');
    Route::post('prosess/beli','BeliController@Prosess');
    Route::get('list/pesanan','BeliController@listPesan');
    Route::get('detail/pesanan/{id}','BeliController@detailprosess');
    Route::get('detail/barang/{id}', 'BeliController@detailBarang');
    Route::get('riwayat','BeliController@riwayat');
    Route::get('terima/barang/{id}','BeliController@terima');
    Route::get('batal/beli','BeliController@cencelBeli');
    Route::get('delete/beli/{id}','BeliController@DeleteBeli');
    Route::get('hapus/transaksi/{id}','BeliController@hapusTransaksi');
    Route::view('pengaturan', 'public.pengaturan');
});

Route::view('lupa', 'public.lupa');
// Route::middleware('CekRole')->group(function () {

//     Route::get('add/list/barang','ManageBarangController@add');
// });

// Route::get('add/list/barang','ManageBarangController@add');

Route::middleware('auth')->group(function(){
    Route::middleware('CekRole')->group(function(){
        Route::get('kosong/item/{id}','ManageBarangController@tidakAda');
        Route::get('ada/{id}','ManageBarangController@ada');
        Route::get('promosi','PromosiController@index');
        Route::post('promo/add','PromosiController@add');
        Route::get('promo/hapus/{id}','PromosiController@delete');
        Route::get('promo/edit/{id}','PromosiController@show');
        Route::post('promo/edit','PromosiController@edit')->name('editpromo');
        Route::post('edit/kategori','KategoriController@edit')->name('editkategori');
        Route::get('edit/kategori/view/{id}','KategoriController@editview');
        Route::get('hapus/kategori/{id}','KategoriController@delete');
        Route::post('add/kategori','KategoriController@add');
        Route::get('kategori/view','KategoriController@index');
        Route::post('topup/prosess','TopupController@prosess')->name('topup');
        Route::get('topup/admin','TopupController@topup');
        Route::get('view/all/barang','ManageBarangController@index');
        Route::get('add/list','ManageBarangController@add');
        Route::post('add/barang','ManageBarangController@create')->name('addbarang');
        Route::get('view/list','AdminController@index');
        Route::get('delete/item/{id}','ManageBarangController@hapus');
        Route::post('edit/item','ManageBarangController@edit')->name('editbarang');
        Route::get('edit/view/{id}','ManageBarangController@editview');
    });
        Route::middleware('isGudang')->group(function(){
        Route::get('barang/kosong/{id}','KosongController@kosong');
        Route::post('edit/stock','KosongController@edit');
        Route::get('dikirim/{id}','GudangController@dikirim');
        Route::get('dikemas/{id}','GudangController@dikemas');
        Route::get('gudang/list','GudangController@index');
    });

    
});
