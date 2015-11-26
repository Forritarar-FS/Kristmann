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

Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index');
Route::get('index/{username}', 'PagesController@profile');
Route::get('/signup', 'PagesController@signUp');
Route::post('/', 'PagesController@store');

Route::get('/vefsida', 'PagesController@vefsidur');
Route::get('/verktakar', 'PagesController@verktak');


Route::get('/create', 'PagesController@create');
Route::get('/createverk', 'PagesController@createverk');

Route::get('/vefsida/{id}', 'PagesController@show');

Route::get('/verktakar/{id}', 'PagesController@showverk');

Route::post('/vefsida', 'PagesController@VefStore');
Route::post('/verktakar', 'PagesController@VerkStore');
Route::post('/vefsida/breytacomment', 'PagesController@breytacommentsvef');
Route::post('/verktakar/breytacomment', 'PagesController@breytacommentsverk');
Route::post('/index/breytacomment', 'PagesController@breytacommentsprofile');

Route::post('/setphoto', 'PagesController@PhotoId');
Route::post('/VefsaveComment', 'PagesController@vefComments');
Route::post('/VerksaveComment', 'PagesController@verkComments');

Route::post('/profilesaveComment', 'PagesController@profileComments');


Route::post('/frett', 'PagesController@frettin');


Route::post('/vefsida/veljamann/{username}', 'PagesController@veljamann');
Route::post('/verktakar/veljamann/{username}', 'PagesController@Veljaverktaka');


Route::post('/reddescrip', 'PagesController@editDescription');


Route::post('/vefsida/{id}', 'PagesController@vefedited');
Route::post('/Vefsida/Edit/{id}', 'PagesController@vefedit');
Route::post('/verktakar/{id}', 'PagesController@verkedited');
Route::post('/Verktakar/Edit/{id}', 'PagesController@verkedit');


Route::get('/helgi', 'PagesController@helgi');
Route::get('/kristmann', 'PagesController@kristmann');
Route::get('/contact', 'PagesController@contact');



Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
