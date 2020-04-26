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

//login
Route::get('/','AuthController@login');
Route::get('/login','AuthController@login')->name('login');
Route::get('/register','AuthController@register')->name('register');
Route::post('/postregister','AuthController@postregister');
Route::post('/postlogin','AuthController@postlogin');
//akhiran login




//Hak Akses admin
Route::group(['middleware' => ['auth','CheckRole:admin']], function(){
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/create', 'SiswaController@create');
	Route::get('/siswa/{id}/edit','SiswaController@edit');
	Route::get('/siswa/{id}/delete','SiswaController@delete');
	Route::post('/siswa/{id}/update','SiswaController@update');
	//Rayon
	Route::get('/rayon','RayonController@index');
	Route::post('/rayon/create','RayonController@create');
	Route::get('/rayon/{id}/edit','RayonController@edit');
	Route::get('/rayon/{id}/delete','RayonController@delete');
	Route::post('/rayon/{id}/update','RayonController@update');
	//Akhiran Rayon
	Route::get('/rombel','RombelController@index');
	Route::post('/rombel/create','RombelController@create');
	Route::get('/rombel/{id}/edit','RombelController@edit');
	Route::get('/rombel/{id}/delete','RombelController@delete');
	Route::post('/rombel/{id}/update','RombelController@update');
});
//akhiran hak akses




//awal home
Route::get('/home','HomeController@index');
//akhiran home


// hak akses siswa
Route::group(['middleware' => ['auth','CheckRole:siswa']], function(){
//profile

Route::get('/profile','ProfileController@index');
Route::get('/set','SetController@index');
Route::post('/set/create','SetController@create');
Route::get('/profile/password','ProfileController@password');
Route::post('/profile/{id}/reset','ProfileController@reset');
//akhiran profile

});
//akhiran hak akses siswa
