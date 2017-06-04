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

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN
Route::resource('admin/buku', 'BukuController');
Route::resource('admin/kategori', 'KategoriController');
Route::resource('admin/detail_transaksi', 'DetailTransaksiController');
Route::resource('admin/daftar_ulang', 'DaftarUlangController');
Route::resource('admin/transaksi', 'TransaksiController');

//USER Biasa
Route::resource('user/buku', 'user\BukuController');



//Route::get('login/siapolitani', 'Auth\LoginController@redirectToProvider');
//Route::get('login/siapolitani/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/login/siapolitani/{username}/{password}', function ($username,$password){
	$http = new GuzzleHttp\Client;

	$response = $http->post('http://sia.politanisamarinda.ac.id/oauth/token', [
    'form_params' => [
        'grant_type' => 'password',
        'client_id' => '3',
        'client_secret' => 'vkHIOjl5ez1LW9FGU7IRsIhjtHB2pQw9pbIXLfPW',
        'username' => $username,
        'password' => $password,
       // 'scope' => '',
    ],
]);

return json_decode((string) $response->getBody(), true);

});

Route::get('/test',function(Illuminate\Http\Request $request){
    return $request->user()->admin_perpustakaan;
});


//Route::get('login/coba', 'LoginController@isAuthorized');
