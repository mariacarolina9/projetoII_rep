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

Route::get('utilizador/criar','UtilizadorController@create')->name('utilizador.criar');

Route::post('utilizador','UtilizadorController@store')->name('utilizador');

Route::get('user/listar','UtilizadorController@index')->name('users.listar');

Route::get('utilizador/{id}','UtilizadorController@view')->name('utilizador.ver');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
