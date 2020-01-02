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


Route::get('/','HomeController@index');
Route::get('reservationbedroom','ReservationBedroomController@index');
Route::get('reservationevent','ReservationEventController@index');
Route::get('a-propos','AproposController@index');
Route::get('services','ServicesController@index');
Route::get('contact','ContactController@index');
Route::post('contact','ContactController@store');

Route::post('resbedroomcreate','ReservationBedroomController@store')->name('ajout/reservation/bedroom');
Route::get('resbedroomcreate','ReservationBedroomController@create')->name('reservation/bedroom');
Route::post('resbedroomcreate','ReservationBedroomController@store');
Route::get('resbedroomedit/{id}','ReservationBedroomController@edit')->name('editer/resbedroom');
Route::patch('/resbedroomupdate/{id}','ReservationBedroomController@update')->name('update/resbedroom');
Route::delete('resbedroomedit/{id}', 'ReservationBedroomController@destroy');

Route::get('bedroom','BedroomController@index');
Route::post('bedroomcreate','BedroomController@create');
Route::get('bedroomcreate','BedroomController@create');
Route::post('bedroomcreate','BedroomController@store');
Route::get('bedroomedit/{id}','BedroomController@edit')->name('editer_bedroom');
Route::patch('/bedroomupdate/{id}','BedroomController@update')->name('update_bedroom');
Route::delete('bedroomedit/{id}', 'BedroomController@destroy');


Route::post('reseventcreate','ReservationEventController@create');
Route::get('reseventcreate','ReservationEventController@create');
Route::post('reseventcreate','ReservationEventController@store');
Route::get('reseventedit/{id}','ReservationEventController@edit')->name('editer/event');
Route::patch('/reseventupdate/{id}','ReservationEventController@update')->name('update/event');
Route::delete('reseventedit/{id}', 'ReservationEventController@destroy');

Route::get('reservationchambre','ReservationBedroomController@clreservationchambre');
Route::post('reservationchambre','ReservationBedroomController@updatefrontoffice');

Route::get('reservationevenement','ReservationEventController@clreservationevenement');
Route::post('reservationevenement','ReservationEventController@updatefrontoffice');

Route::post('Resultbedroom','ResultbedroomController@Resultbedroom')->name('resultat/recherche');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
