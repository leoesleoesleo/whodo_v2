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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'adminPanelMiddleware'], function(){
    Route::get('/adminpanel', 'adminPanelController@index')->name('adminpanel');
    Route::post('/createuser', 'adminPanelController@createUser');
    Route::post('/edituser', 'adminPanelController@editUser');
    Route::post('/deleteuser', 'adminPanelController@deleteUser');
    Route::get('/proveedorPanel', 'adminPanelController@proveedorindex')->name('proveedorindex');
    Route::post('/createproveedor', 'adminPanelController@createProveedor');
    Route::post('/editproveedor', 'adminPanelController@editProveedor');
    Route::post('/deleteproveedor', 'adminPanelController@deleteProveedor');
    Route::get('/sugerenciacategoria', 'adminPanelController@indexSugerencias')->name('sugerenciacategoria');
});

Route::get('/proveedorcatalogo', 'proveedorcatalogoController@index')->name('proveedorcatalogo');
Route::post('/crearPortafolio', 'proveedorcatalogoController@createCatalogo');
Route::post('/cargaProductos', 'proveedorcatalogoController@cargarExcel')->name('cargaProductos');
Route::post('/sugerirCategoria', 'proveedorcatalogoController@sugerirCategoria')->name('sugerirCategoria');
Route::post('/crearCategoria', 'proveedorcatalogoController@createCategoria')->name('crearCategoria');
Route::post('/deleteCategoria', 'proveedorcatalogoController@deleteCategoria')->name('deleteCategoria');

Route::get('/clientecatalogo', 'clientecatalogoController@index')->name('clientecatalogo');
Route::post('/searchFilter', 'clientecatalogoController@searchFilter')->name('searchFilter');
