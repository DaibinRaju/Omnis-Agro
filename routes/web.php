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

use App\Http\Controllers\PredictionController;


Route::get('/','LoginController@index');
Route::post('/','LoginController@login');
Route::get('/register','LoginController@registerform');
Route::post('/register','LoginController@register');
Route::get('/logout','LoginController@logout');

Route::get('/predict','PredictionController@index');
Route::post('/predict','PredictionController@predict');

Route::group(['prefix' => 'user','middleware' => 'checkUser'], function () {
    Route::get("/", "HomeController@index");
    Route::get("/home", "HomeController@index");
    Route::get("/scan", "HomeController@create");
    Route::post("/scan", "HomeController@store");
    Route::get("/scan/{id}","HomeController@show");
    Route::get("/scan/delete/{id}","HomeController@destroy");
    Route::get('/changepassword','LoginController@changepasswordshow');
    Route::post('/changepassword','LoginController@changepasswordstore');
    Route::get("/logout","LoginController@logout");
    
});
