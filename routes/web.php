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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', array('as' => 'index','uses' => 'AlbumsController@index'));
Route::get('/createalbum', array('as' => 'upload','uses' => 'AlbumsController@create'));
Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@store'));
Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@destroy'));
Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@show'));

Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImagesController@create'));
Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImagesController@store'));
Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImagesController@destroy'));


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
