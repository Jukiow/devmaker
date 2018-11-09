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

Route::resource('/', 'devmakerCTRL');
Route::get('/registro', 'devmakerCTRL@registro');
Route::get('/login', 'devmakerCTRL@login');
Route::get('/sistema', 'devmakerCTRL@sistema');
Route::get('/sair', 'devmakerCTRL@sair');
Route::get('/trocar_senha', 'devmakerCTRL@trocar');
Route::get('/novo_post', 'devmakerCTRL@novoPost');
Route::get('/favoritar_post', 'devmakerCTRL@favPost');
Route::get('/unfav_post', 'devmakerCTRL@unfavPost');
