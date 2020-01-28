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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','HomeController@index');
Route::get('reservationchambre','ReservationBedroomController@clreservationchambre');
Route::post('reservationchambre','ReservationBedroomController@updatefrontoffice');
Route::get('reservationevenement','ReservationEventController@clreservationevenement');
Route::post('reservationevenement','ReservationEventController@updatefrontoffice');
Route::get('a-propos','AproposController@index');
Route::get('services','ServicesController@index');
Route::get('contact','ContactController@index');
Route::post('contact','ContactController@store');
Route::get('recherche','BedroomController@recherche')->name('recherche');
Route::post('bedroomajax', 'BedroomController@bedroomajax')->name('bedroomajax');

Route::get('contactmessage','ContactController@Message')->middleware('auth');

Route::post('contactcreate','ContactController@create')->middleware('auth');
Route::get('contactcreate','ContactController@create')->middleware('auth');
Route::post('contactcreate','ContactController@store')->middleware('auth');
Route::get('contactedit/{id}','ContactController@edit')->middleware('auth');
Route::patch('/contactmessageupdate/{id}','ContactController@update')->middleware('auth');
Route::delete('contactedit/{id}','ContactController@destroy')->middleware('auth');


Route::get('besoinclient','BesoinClientController@index')->middleware('auth');

Route::post('besoinclientcreate','BesoinClientController@create')->middleware('auth');
Route::get('besoinclientcreate','BesoinClientController@create')->middleware('auth');
Route::post('besoinclientcreate','BesoinClientController@store')->middleware('auth');
Route::get('besoinclientedit/{id}','BesoinClientController@edit')->middleware('auth');
Route::patch('/besoinclientupdate/{id}','BesoinClientController@update')->middleware('auth');
Route::delete('besoinclientedit/{id}', 'BesoinClientController@destroy')->middleware('auth');

Route::get('reservationbedroom','ReservationBedroomController@index')->name('admin/reservationbedrom')->middleware('auth');

Route::post('resbedroomcreate','ReservationBedroomController@store')->middleware('auth');
Route::get('resbedroomcreate','ReservationBedroomController@create')->middleware('auth');
Route::post('resbedroomcreate','ReservationBedroomController@store')->middleware('auth');
Route::get('resbedroomedit/{id}','ReservationBedroomController@edit')->middleware('auth');
Route::patch('/resbedroomupdate/{id}','ReservationBedroomController@update')->middleware('auth');
Route::delete('resbedroomedit/{id}', 'ReservationBedroomController@destroy')->middleware('auth');

Route::get('bedroom','BedroomController@index')->middleware('auth');

Route::post('bedroomcreate','BedroomController@create')->middleware('auth');
Route::get('bedroomcreate','BedroomController@create')->middleware('auth');
Route::post('bedroomcreate','BedroomController@store')->middleware('auth');
Route::get('bedroomedit/{id}','BedroomController@edit')->middleware('auth');
Route::patch('/bedroomupdate/{id}','BedroomController@update')->middleware('auth');
Route::delete('bedroomedit/{id}', 'BedroomController@destroy')->middleware('auth');

Route::get('reservationevent','ReservationEventController@index')->middleware('auth');

Route::post('reseventcreate','ReservationEventController@create')->middleware('auth');
Route::get('reseventcreate','ReservationEventController@create')->middleware('auth');
Route::post('reseventcreate','ReservationEventController@store')->middleware('auth');
Route::get('reseventedit/{id}','ReservationEventController@edit')->middleware('auth');
Route::patch('/reseventupdate/{id}','ReservationEventController@update')->middleware('auth');
Route::delete('reseventedit/{id}', 'ReservationEventController@destroy')->middleware('auth');

Route::get('disposal','DisposalRoomController@index')->middleware('auth');

Route::post('disposalcreate','DisposalRoomController@create')->middleware('auth');
Route::get('disposalcreate','DisposalRoomController@create')->middleware('auth');
Route::post('disposalcreate','DisposalRoomController@store')->middleware('auth');
Route::delete('disposaledit/{id}', 'DisposalRoomController@destroy')->middleware('auth');

Route::get('room','RoomController@index')->middleware('auth');

Route::post('roomcreate','RoomController@create')->middleware('auth');
Route::get('roomcreate','RoomController@create')->middleware('auth');
Route::post('roomcreate','RoomController@store')->middleware('auth');
Route::delete('roomedit/{id}', 'RoomController@destroy')->middleware('auth');

Route::get('typeevent','TypeEventController@index')->middleware('auth');

Route::post('typeeventcreate','TypeEventController@create')->middleware('auth');
Route::get('typeeventcreate','TypeEventController@create')->middleware('auth');
Route::post('typeeventcreate','TypeEventController@store')->middleware('auth');
Route::delete('typeeventedit/{id}', 'TypeEventController@destroy')->middleware('auth');

Auth::routes();
Route::get('/admin', 'BackofficeController@index');
Route::resource('/admin/users', 'Admin\UsersController');
