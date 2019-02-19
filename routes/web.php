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

use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@getIndex');

Route::get('/upload', 'FileController@getIndex');
Route::get('/kalendar', 'CalendarController@getIndex');

Route::post('/store', 'FileController@store')->name('file.store');

//ajax
Route::get('galerija', 'AjaxController@galerija');

Route::get('raspored', 'AjaxController@raspored');

Route::get('spremiKalendar', 'AjaxController@spremiKalendar');


