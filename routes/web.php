<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LoginController@index');
Route::get('/do-login', 'LoginController@doLogin');
Route::get('/do-logout', 'LoginController@doLogout');

Route::group(['middleware' => 'checkuser'], function () {
  Route::get('/list-jobs', 'JobsController@index');
  Route::get('/detail-jobs/{id}', 'JobsController@detailJobs');
  Route::get('/search-jobs', 'JobsController@searchJobs');
});
