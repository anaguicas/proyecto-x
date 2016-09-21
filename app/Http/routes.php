<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    //return view('welcome');
    return view('landing');
});
*/

/*-------Landing-----------*/
Route::get('/', [

	'as' => 'landing',
    'uses' => 'LandingController@Inicio'
]);

/*-------Login-----------*/
Route::get('login', [

	'as' => 'login',
    'uses' => 'LoginController@Inicio'
]);

Route::post('login', [

	'as' => 'login',
    'uses' => 'LoginController@store'
]);

Route::get('logout', [

	'as' => 'logout',
    'uses' => 'LoginController@logout'
]);

//Route::resource('log','LoginController');

Route::get('SignUp',function(){
	return view('Singup');
});


/*-------Subscriber-----------*/
Route::get('subscriber/inicio', [

	'as' => 'subscriber.inicio',
    'uses' => 'SubscriberController@Inicio'
]);

Route::get('subscriber-register',[
	'as' => 'subscriber.register',
	'uses' => 'SubscriberController@FormRegister'
]);

Route::post('subscriber-register',[
	'as' => 'subscriber.register',
	'uses' => 'SubscriberController@Register'
]);

Route::get('subscriber/edit-profile',[
	'as' => 'subscriber.editprofile',
	'uses' => 'SubscriberController@FormProfile'
]);
Route::post('subscriber/edit-profile',[
	'as' => 'subscriber.save',
	'uses' => 'SubscriberController@saveProfile'
]);


/*--------Performer-----------*/

Route::get('performer/inicio', [
	'as' => 'performer.inicio',
    'uses' => 'PerformerController@Inicio'
]);

Route::get('performer-register',[
	'as' => 'performer.register',
	'uses' => 'PerformerController@FormRegister'
]);

Route::post('performer-register',[
	'as' => 'performer.register',
	'uses' => 'PerformerController@Register'
]);

Route::get('performer/edit-profile',[
	'as' => 'performer.editprofile',
	'uses' => 'PerformerController@FormProfile'
]);

Route::post('performer/edit-profile',[
	'as' => 'performer.save',
	'uses' => 'PerformerController@saveProfile'
]);

/*---------Studio---------*/
Route::get('studio/inicio', [
	'as' => 'studio.inicio',
    'uses' => 'StudioController@Inicio'
]);


Route::get('studio-register', [
	'as' => 'studio.register',
	'uses' => 'StudioController@FormRegister'
]);

Route::post('studio-register', [
	'as' => 'studio.register',
	'uses' => 'StudioController@Register'
]);

Route::get('studio/edit-profile/{id}',[
	'as' => 'studio.editprofile',
	'uses' => 'StudioController@FormProfile'
]);

Route::put('studio/edit-profile/{id}',[
	'as' => 'studio.save',
	'uses' => 'StudioController@saveProfile'
]);

Route::post('registro',function(){
	return view('welcome');
});

Route::get('studio/showPerformers',[
    'as'=> 'studio.showperformers',
    'uses' => 'StudioController@showPerformers'
]);

Route::get('studio/removeperformer/{id}',[
    'as'=> 'studio.removeperformer',
    'uses' => 'StudioController@removePerformer'
]);

Route::get('studio/addPerformer',[
    'as' => 'studio.addperformer',
    'uses' => 'StudioController@performerRegister'
]);


Route::post('studio/addperformer',[
    'as' => 'studio.addperformer',
    'uses' => 'StudioController@savePerformer'
]);







