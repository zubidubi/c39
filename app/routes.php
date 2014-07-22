<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function()
{
	//administrador
	Route::group(array('before' => 'isAdmin'), function()
	{
		//index
		Route::get('indexAdmin', function()
		{
    		return View::make('indexAdmin');
		});

		Route::get('c39manifiestos/ingresarArribo/{manifiesto}', 'C39manifiestosController@ingresarArribo');
		Route::get('c39manifiestos/ingresarZarpe/{manifiesto}', 'C39manifiestosController@ingresarZarpe');
		Route::get('c39manifiestos/editarUsuario/{usuario}', 'C39usuariosController@editarUsuario');
		Route::post('c39manifiestos/update', 'C39manifiestosController@update');
		Route::post('c39usuarios/update', 'C39usuariosController@update');

		Route::get('c39manifiestos/arribo', 'C39manifiestosController@arribo');
		Route::get('c39manifiestos/zarpe', 'C39manifiestosController@zarpe');
		Route::post('c39usuarios/create', 'C39usuariosController@store');

		Route::resource('c39usuarios','C39usuariosController');
		Route::resource('c39puertos','C39puertosController');
		Route::resource('c39sitios','C39sitiosController');
		Route::resource('c39rols','C39rolsController');
		Route::resource('c39manifiestos','C39manifiestosController');
	});

	//Naviera
	Route::group(array('before' => 'isNav'), function()
	{
		//index
		Route::get('indexNav', function()
		{
    		return View::make('indexNav');
		});

		Route::get('c39manifiesto/create', 'C39manifiestosController@create');
		Route::post('c39manifiesto/create', 'C39manifiestosController@store');
		Route::get('c39manifiesto', 'C39manifiestosController@indexNav');
	});

    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
    //cambio de contraseña
    Route::get('passwordChange', 'PasswordController@passwordChange');
	Route::post('passwordChange', 'PasswordController@change');
});

Route::group(array('before' => 'guest'), function()
{
	//index
	Route::get('/', function()
	{
		return View::make('index');
	});

	// Nos mostrará el formulario de login.
	Route::get('login', 'AuthController@showLogin');

	// Validamos los datos de inicio de sesión.
	Route::post('login', 'AuthController@postLogin');

	//recuperar contaseña
	Route::controller('password', 'RemindersController');
	Route::get('password/reset/{token}', 'RemindersController@getReset');
	Route::post('password/reset/{token}', array('uses' => 'RemindersController@postReset', 'as' => 'password.update'));
});


