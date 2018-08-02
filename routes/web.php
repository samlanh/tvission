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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/locale', array(
	'before' => 'csrf',
    'uses' => 'LanguageController@index'
     ));

Route::post('/tickets/ticket_cart', array(
	'before' => 'csrf',
    'uses' => 'indexController@requestticket'
     ));

Route::group(['middleware'=>'auth'], function () {
    
});
Route::get('/showdata', 'indexController@index');
Route::get('/','IndexController@index');

Route::get('/location','LocationController@index');
Route::post('location', 'LocationController@index');

Route::get('/jquerytypeahead/location.json', array(
	'before' => 'csrf',
    'uses' => 'LocationController@pickuplocationc'
 ));



Route::get('/jquery/location.json', array(
	'before' => 'csrf',
    'uses' => 'LocationController@pickuplocationc'
 ));
Route::get('/data/films/queries/%QUERY.json', array(
	'before' => 'csrf',
    'uses' => 'LocationController@pickuplocationc'
 ));


Route::get('/search','IndexController@result');
Route::get('/ticket/select_seat','IndexController@ticket');
Route::get('/tickets/pay','IndexController@payment');
Route::get('tickets/payment','IndexController@comfirmpayment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
