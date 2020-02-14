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

Route::get('/', 'HomeController@accueil')->name('accueil');
Route::get('/home','HomeController@index')->name('home');

Route::get('reservationchambre','ReservationBedroomController@clreservationchambre')->name('reservation/chambre');
Route::post('reservationchambre','ReservationBedroomController@updatefrontoffice');
Route::get('reservationevenement','ReservationEventController@clreservationevenement')->name('reservation/evenement');
Route::post('reservationevenement','ReservationEventController@updatefrontoffice');
Route::get('a-propos','AproposController@index')->name('a-propos');
Route::get('services','ServicesController@index')->name('services');
Route::get('contact','ContactController@index')->name('contact');
Route::post('contact','ContactController@store');
Route::get('recherche','BedroomController@recherche')->name('recherche');
Route::post('bedroomajax', 'BedroomController@bedroomajax')->name('bedroomajax');

Route::get('contactmessage','ContactController@Message')->name('contact/message')->middleware('auth');

Route::post('contactcreate','ContactController@create')->middleware('auth');
Route::get('contactcreate','ContactController@create')->name('creation/contact/message')->middleware('auth');
Route::post('contactcreate','ContactController@store')->middleware('auth');
Route::get('contactedit/{id}','ContactController@edit')->middleware('auth');
Route::patch('/contactmessageupdate/{id}','ContactController@update')->middleware('auth');
Route::delete('contactedit/{id}','ContactController@destroy')->middleware('auth');

Route::get('hotelservices','ServicesController@Hotelservices')->name('hotel/services')->middleware('auth');

Route::post('servicescreate','ServicesController@create')->middleware('auth');
Route::get('servicescreate','ServicesController@create')->name('creation/hotel/services')->middleware('auth');
Route::post('servicescreate','ServicesController@store')->middleware('auth');
Route::get('servicesedit/{id}','ServicesController@edit')->middleware('auth');
Route::patch('/hotelservicesupdate/{id}','ServicesController@update')->middleware('auth');
Route::delete('servicesedit/{id}','ServicesController@destroy')->middleware('auth');

Route::get('hotelservicesupp','ServicesuppController@index')->name('hotel/servicesupp')->middleware('auth');

Route::post('servicesuppcreate','ServicesuppController@create')->middleware('auth');
Route::get('servicesuppcreate','ServicesuppController@create')->name('creation/hotel/servicesupp')->middleware('auth');
Route::post('servicesuppcreate','ServicesuppController@store')->middleware('auth');
Route::get('servicesuppedit/{id}','ServicesuppController@edit')->middleware('auth');
Route::patch('/hotelservicesuppupdate/{id}','ServicesuppController@update')->middleware('auth');
Route::delete('servicesuppedit/{id}','ServicesuppController@destroy')->middleware('auth');

Route::get('hotelapropos','AproposController@Hotelapropos')->name('hotel/apropos')->middleware('auth');

Route::post('aproposcreate','AproposController@create')->middleware('auth');
Route::get('aproposcreate','AproposController@create')->name('creation/hotel/apropos')->middleware('auth');
Route::post('aproposcreate','AproposController@store')->middleware('auth');
Route::get('aproposedit/{id}','AproposController@edit')->middleware('auth');
Route::patch('/hotelaproposupdate/{id}','AproposController@update')->middleware('auth');
Route::delete('aproposedit/{id}','AproposController@destroy')->middleware('auth');

Route::get('promotion','PromotionController@index')->name('hotel/promotion')->middleware('auth');

Route::post('promotioncreate','PromotionController@create')->middleware('auth');
Route::get('promotioncreate','PromotionController@create')->name('creation/hotel/promotion')->middleware('auth');
Route::post('promotioncreate','PromotionController@store')->middleware('auth');
Route::get('promotionedit/{id}','PromotionController@edit')->middleware('auth');
Route::patch('/promotionupdate/{id}','PromotionController@update')->middleware('auth');
Route::delete('promotionedit/{id}','PromotionController@destroy')->middleware('auth');

Route::get('temoignage','TemoignageController@index')->name('temoignage')->middleware('auth');

Route::get('temoignagecreate','TemoignageController@create')->name('creation/temoignage');
Route::post('temoignagecreate','TemoignageController@create');
Route::post('temoignagecreate','TemoignageController@store');
Route::get('temoignagedit/{id}','TemoignageController@edit')->middleware('auth');
Route::patch('/temoignageupdate/{id}','TemoignageController@update')->middleware('auth');
Route::delete('temoignagedit/{id}','TemoignageController@destroy')->middleware('auth');


Route::get('besoinclient','BesoinClientController@index')->name('besoin/client')->middleware('auth');

Route::post('besoinclientcreate','BesoinClientController@create')->middleware('auth');
Route::get('besoinclientcreate','BesoinClientController@create')->name('creation/besoin/client')->middleware('auth');
Route::post('besoinclientcreate','BesoinClientController@store')->middleware('auth');
Route::get('besoinclientedit/{id}','BesoinClientController@edit')->middleware('auth');
Route::patch('/besoinclientupdate/{id}','BesoinClientController@update')->middleware('auth');
Route::delete('besoinclientedit/{id}', 'BesoinClientController@destroy')->middleware('auth');

Route::get('reservationbedroom','ReservationBedroomController@index')->name('reservation/bedroom')->middleware('auth');

Route::post('resbedroomcreate','ReservationBedroomController@store')->middleware('auth');
Route::get('resbedroomcreate','ReservationBedroomController@create')->name('creation/reservation/bedroom')->middleware('auth');
Route::post('resbedroomcreate','ReservationBedroomController@store')->middleware('auth');
Route::get('resbedroomedit/{id}','ReservationBedroomController@edit')->middleware('auth');
Route::patch('/resbedroomupdate/{id}','ReservationBedroomController@update')->middleware('auth');
Route::delete('resbedroomedit/{id}', 'ReservationBedroomController@destroy')->middleware('auth');

Route::get('bedroom','BedroomController@index')->name('chambre')->middleware('auth');

Route::post('bedroomcreate','BedroomController@create')->middleware('auth');
Route::get('bedroomcreate','BedroomController@create')->name('creation/chambre')->middleware('auth');
Route::post('bedroomcreate','BedroomController@store')->middleware('auth');
Route::get('bedroomedit/{id}','BedroomController@edit')->middleware('auth');
Route::patch('/bedroomupdate/{id}','BedroomController@update')->middleware('auth');
Route::delete('bedroomedit/{id}', 'BedroomController@destroy')->middleware('auth');

Route::get('reservationevent','ReservationEventController@index')->name('reservation/event')->middleware('auth');

Route::post('reseventcreate','ReservationEventController@create')->middleware('auth');
Route::get('reseventcreate','ReservationEventController@create')->name('creation/reservation/event')->middleware('auth');
Route::post('reseventcreate','ReservationEventController@store')->middleware('auth');
Route::get('reseventedit/{id}','ReservationEventController@edit')->middleware('auth');
Route::patch('/reseventupdate/{id}','ReservationEventController@update')->middleware('auth');
Route::delete('reseventedit/{id}', 'ReservationEventController@destroy')->middleware('auth');

Route::get('disposal','DisposalRoomController@index')->name('disposition/salle')->middleware('auth');

Route::post('disposalcreate','DisposalRoomController@create')->middleware('auth');
Route::get('disposalcreate','DisposalRoomController@create')->name('creation/disposition/salle')->middleware('auth');
Route::post('disposalcreate','DisposalRoomController@store')->middleware('auth');
Route::delete('disposaledit/{id}', 'DisposalRoomController@destroy')->middleware('auth');

Route::get('room','RoomController@index')->name('salle')->middleware('auth');

Route::post('roomcreate','RoomController@create')->middleware('auth');
Route::get('roomcreate','RoomController@create')->name('creation/salle')->middleware('auth');
Route::post('roomcreate','RoomController@store')->middleware('auth');
Route::get('roomedit/{id}','RoomController@edit')->middleware('auth');
Route::patch('/roomupdate/{id}','RoomController@update')->middleware('auth');
Route::delete('roomedit/{id}', 'RoomController@destroy')->middleware('auth');

Route::get('typeevent','TypeEventController@index')->name('type/evenement')->middleware('auth');

Route::post('typeeventcreate','TypeEventController@create')->middleware('auth');
Route::get('typeeventcreate','TypeEventController@create')->name('creation/type/evenement')->middleware('auth');
Route::post('typeeventcreate','TypeEventController@store')->middleware('auth');
Route::delete('typeeventedit/{id}', 'TypeEventController@destroy')->middleware('auth');

Auth::routes();

//Route::resource('/users', 'Admin/UsersController');
//Route::get('/users', 'Admin/UsersController');

Route::resource('/utilisateur','Admin\UsersController');
Route::get("/utilisateur/edit/{id}","Admin\UsersController@edit")->name('utilisateur.edit');
Route::patch("/utilisateur/edit/{id}","Admin\UsersController@update")->name('utilisateur.update');
