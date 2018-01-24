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

use Illuminate\Http\Request;

Route::get('/home', function () {
    
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/iss', 'HomeController@iss_home')->name('iss_home')->middleware('auth');

Route::get('/test', 'HomeController@test');//->name('home');


Route::get('/iss', 'HomeController@iss_home')->name('iss_home')->middleware('auth')->middleware('auth.basic');
Route::get('/SQLinjection', 'HomeController@SQLinjection')->name('SQLinjection');
Route::post('/SQLinjection/ranjiv', 'HomeController@SQLinjection_ranjiv')->name('SQLinjection_ranjiv');
Route::post('/SQLinjection/SQLinjection_nije_ranjiv', 'HomeController@SQLinjection_nije_ranjiv')->name('SQLinjection_nije_ranjiv');


Route::get('/guest', 'HomeController@guest')->name('guest')->middleware('guest');

Route::get('/logged_in', 'HomeController@logged')->name('logged')->middleware('auth');

Route::get('/admin', 'HomeController@admin')->name('admin')->middleware('admin');

Route::get('/XSS', 'HomeController@xss')->name('xss');
Route::post('/XSS/ranjiv', 'HomeController@xss_ranjiv')->name('xss_ranjiv');
Route::post('/XSS/siguran', 'HomeController@xssSiguran')->name('xss_siguran');
Route::get('/csrf', 'HomeController@csrf')->name('csrf');
Route::post('/csrf/ranjiv', 'HomeController@CSRF_ranjiv')->name('CSRF_ranjiv');

// First route that user visits on consumer app
Route::get('/','HomeController@index')->name('home');


