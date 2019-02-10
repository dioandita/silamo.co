<?php
Route::get('/', function () {
    return view('home.home');
})->name('home');
Auth::routes();
Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/checkout', function () {
    return view('home.pages.checkout');
})->name('checkout');
Route::get('/getcity/{id}','RajaongkirController@getCity');
Route::get('/getkurir','RajaongkirController@getKurir');
Route::get('/getprovince','RajaongkirController@getProvince');
Route::get('/getcost/{id}','RajaongkirController@getCost')->name('getcost');
Route::get('/getlayanan/{id}','RajaongkirController@getLayanan')->name('getlayanan');

Route::Resource('/shop','ShopController');
Route::Resource('/cart','CartController');
Route::get('/household','ShopController@indexHouseHold')->name('household');
Route::get('/kawa','ShopController@indexKawa')->name('kawa');
Route::get('/gizmoz','ShopController@indexGizmoz')->name('gizmoz');
Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard','HomeController@indexAdmin')->name('homeadmin');
    Route::resource('/datauser','UserController');
    Route::resource('/datakategori','KategoriController');
    Route::resource('/dataproduct','ProductController');
 });