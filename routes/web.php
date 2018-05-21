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


Route::get('/perfil', 'HomeController@perfil')->name('perfil');
 Route::resource('user', 'UserController');
Route::resource('Torneo', 'TorneoController');

Route::get('/Foto', 'HomeController@Foto')->name('Foto');
Route::get('/CrearTorneo', 'HomeController@CrearTorneo')->name('CrearTorneo');
Route::get('/Changepwd', 'HomeController@Changepwd')->name('Changepwd');
Route::post('/users/updatePassword/{id}', 'UserController@updatepwd')->name('user.updatepwd');
Route::post('/users/updateimg/{id}', 'UserController@updateimg')->name('user.updateimg');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');
Route::post('/Torneo/{id}', 'TorneoController@show')->name('Torneo.show');
Route::get('/lista', 'TorneoController@index')->name('lista');

Route::get('/vista', 'ParticipantesController@vista')->name('Participantes.vista');
Route::get('/Participantes/{id}', 'ParticipantesController@VerParticipantes')->name('Participantes.VerParticipantes');
Route::get('/Mario', 'TorneoController@VerMario')->name('Torneo.VerMario');
Route::get('/LeagueOfLegends', 'TorneoController@VerLOL')->name('Torneo.VerLOL');
Route::get('/Hearthstone', 'TorneoController@VerHearthstone')->name('Torneo.VerHearthstone');
Route::get('/Overwatch', 'TorneoController@VerOverwatch')->name('Torneo.VerOverwatch');
Route::delete('/Participantes/{id}','ParticipantesController@destroy');

Route::post('/Vertorneo/{id}', 'TorneoController@verTorneo')->name('Torneo.detallestorneo');

Route::post('/Vertorneo/inscrito/{id}','ParticipantesController@store')->name('Participantes.inscripcion');

Route::get('/Vertorneo/{id}', [ 'as' => 'torneo-ver', 'uses' => 'TorneoController@Vertorneo']);