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

// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');

Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('Admin', array("before" => "roles:2,dasd",function()
    {
        return 'dadasdasdsada';//View::make('hello');
    }));
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('users', function()
{
    return View::make('indexAdmin');
});



Route::get('Admin', 'AdminController@index');
Route::get('Admin/crearEncabezadoManifiesto', 'AdminController@crearEncabezadoManifiesto');
Route::post('Admin/crearEncabezadoManifiesto', 'AdminController@crearEM');
Route::post('c39usuarios/create', 'C39usuariosController@store');
Route::resource('c39usuarios','C39usuariosController');
Route::resource('c39puertos','C39puertosController');
Route::resource('c39rols','C39rolsController');