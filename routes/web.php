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
//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
//route untuk melakukan aktivasi email
Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
//route untuk melakukan pengiriman pesan emeil aktivasi
Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ActivationResendController@resend');
//route untuk logout pelanggan
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');
// Route sebelum pelanggan login
Route::get('/', 'SiteController@index')->name('welcome');
Route::get('/produk', 'SiteController@produk')->name('produk');
Route::get('/panduan', 'SiteController@panduan')->name('panduan');

// Route setelah pelanggan login
Route::group(['middleware' => 'auth'],function(){
	Route::get('/tentukan-ukuran-&-jumlah/{id}', 'PesananController@index');
	Route::post('/masukan-keranjang/{id}', 'PesananController@add_keranjang');
	Route::get('/keranjang', 'PesananController@keranjang');
	Route::get('/keranjang/{id}/hapus', 'PesananController@hapus');
	Route::get('/keranjang/checkout', 'PesananController@checkout');
	Route::get('/keranjang/checkout_detail/{id}', 'PesananController@checkout_detail');
	Route::get('/province/{id}/cities','PesananController@getCities');
	Route::get('/batalkan-pesanan/{id}','PesananController@batalkanPesanan');
	Route::post('/postservice', 'PesananController@post_service');
	Route::post('/pembayaran/lunas', 'PembayaranController@bayarkan')->name('pembayaran.lunas');
	Route::get('/riwayat', 'RiwayatController@index')->name('pelanggan.riwayat');
	Route::get('/riwayat/pesanan/{id}', 'RiwayatController@riwayatPsn');
	Route::post('/riwayat/pesanan/{id}/post', 'RiwayatController@post');
});
// Route menerima feedback dari midtrans
Route::post('/notification/handler', 'PembayaranController@notificationHandler')->name('notification.handler');
Route::post('/finish', function(){
    return redirect()->route('welcome');
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
	//password reset routes	
	Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admin.password.update');
	Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::group(['middleware' => 'auth:admin'],function(){
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
		Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
		// kelola akun admin
		Route::get('/profile/{id}', 'Admin\AdminController@index')->name('admin.profile');
		Route::post('/profile/{id}/update', 'Admin\AdminController@update');
		Route::get('/profile/{id}/ganti-password', 'Admin\AdminController@gantiPass')->name('admin.ganti');
		Route::post('/profile/{id}/ganti-password/update', 'Admin\AdminController@ganti');
		// crud data produk
		Route::get('/produk', 'Admin\ProdukController@index')->name('admin.produk');
		Route::post('/produk-create', 'Admin\ProdukController@create')->name('admin.produk.create');
		Route::get('/produk/{id}/delete', 'Admin\ProdukController@delete');
		Route::get('/produk/{id}/edit', 'Admin\ProdukController@edit')->name('admin.produk.edit');
		Route::post('/produk/{id}/update', 'Admin\ProdukController@update');
		Route::get('/cetak/laporan/produk', 'Admin\ProdukController@laporanProduk')->name('admin.produk.cetak');

		// crud data kategori
		Route::get('/kategori', 'Admin\KategoriController@index')->name('admin.kategori');
		Route::post('/kategori-create', 'Admin\KategoriController@create')->name('admin.kategori.create');
		Route::post('/kategori/{id}/update', 'Admin\KategoriController@update');
		Route::get('/kategori/{id}/delete', 'Admin\KategoriController@delete');

		// crud data supplier
		Route::get('/supplier', 'Admin\SupplierController@index')->name('admin.supplier');
		Route::post('/supplier-create', 'Admin\SupplierController@create')->name('admin.supplier.create');
		Route::post('/supplier/{id}/update', 'Admin\SupplierController@update');
		Route::get('/supplier/{id}/delete', 'Admin\SupplierController@delete');

		// DATA CUSTOMER
		Route::get('/customer', 'Admin\CustomerController@index')->name('admin.customer');

		// pesanan
		Route::get('/menunggu-pembayaran', 'Admin\TransaksiController@index')->name('admin.pesanan');
		Route::get('/transaksi/lihat/{id}', 'Admin\TransaksiController@lihat');

		Route::get('/sudah-dibayar', 'Admin\TransaksiController@sudahDibayar')->name('admin.sudah-dibayar');
		Route::get('/sudah-dikirim', 'Admin\TransaksiController@sudahDikirim')->name('admin.sudah-dikirim');
		Route::get('/selesai', 'Admin\TransaksiController@selesai')->name('admin.selesai');
		Route::get('/batal', 'Admin\TransaksiController@batal')->name('admin.batal');

		Route::get('/transaksi/cetakAlamat/{id}', 'Admin\TransaksiController@cetak');
		Route::get('/transaksi/kirim-resi/{id}', 'Admin\TransaksiController@kirimResi');
		Route::post('/transaksi/kirim-resi/{id}/update', 'Admin\TransaksiController@kirimResiPost');

		Route::get('/transaksi/ubah-status/{id}', 'Admin\TransaksiController@ubahStatus');
		Route::post('/transaksi/ubah-status/{id}/update', 'Admin\TransaksiController@updateStatus');

		//cetak laporan
		Route::get('/laporan', 'Admin\ReportController@index')->name('admin.laporan');
		Route::get('/laporan/{tgl_mulai}/{tgl_selesai}', 'Admin\ReportController@lihat');
    });
});
