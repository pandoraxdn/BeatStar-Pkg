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

Route::middleware('token')->group(function() {

	Route::middleware('hash')->group(function() {

		Route::get('validate/{param}/{date}', function () { 
			//
		})->name("validate");
	
		// Se recomienda usar está ruta para acceder a rutas de tipo get sin parametros adicionales.

		// Ejemplos:

		// {{ url('validate',['param'=>FunctionPkg::encrypt('getter/artista'),'date'=>FunctionPkg::current_day()]) }}

		// {{ route('validate',['param'=>FunctionPkg::encrypt('getter/artista'),'date'=>FunctionPkg::current_day()]) }}

    	Route::group(['prefix' => 'getter'], function () {

    		// Añadir rutas de tipo get con name

    		// Ejemplos:

    		// Route::get("prueba/{date}", function (){ return view("prueba"); })->name("prueba");

    		// Route::get("artista/{date}","ArtistaController@index")->name("artista");

    		// Route::get("edit-artista/{date}/{id}","ArtistaController@edit")->name("edit-artista");

    
		}); // End of prefix getter

		Route::group(['prefix' => 'setter'], function () {

			// Añadir rutas de tipo post con name

			// Ejemplos:

			// Route::post("store-artista/{date}","ArtistaController@store")->name("store-artista");

        	// Route::post("update-artista/{date}/{id}","ArtistaController@update")->name("update-artista");

		}); // End of prefix setter

	}); // End of middleware hash

}); // End of middleware token