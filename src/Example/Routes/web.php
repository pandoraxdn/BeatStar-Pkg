<?php

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('hash')->group(function() {

	Route::get('validate/{param}/{date}', function () { 
		//
	})->name("validate");

    Route::group(['prefix' => 'getter'], function () {

    	Route::get("prueba/{date}", function (){ return view("prueba"); })->name("prueba");

        // Crud Artistas
    	Route::get("artista/{date}","ArtistaController@index")->name("artista");
    	Route::get("create-artista/{date}","ArtistaController@create")->name("create-artista");
        Route::get("edit-artista/{date}/{id}","ArtistaController@edit")->name("edit-artista");
        Route::get("delete-artista/{date}/{id}","ArtistaController@delete")->name("delete-artista");
        Route::get("active-artista/{date}/{id}","ArtistaController@active")->name("active-artista");

        // Crud Disqueras - Ajax
        Route::get("disquera/{date}","DisqueraController@index")->name("disquera");
        Route::get("edit-disquera/{date}/{id}","DisqueraController@edit")->name("edit-disquera");
    
	});

	Route::group(['prefix' => 'setter'], function () {

    	Route::post("form/{date}","ValidateController@form")->name("form");

        // Crud Artistas
    	Route::post("store-artista/{date}","ArtistaController@store")->name("store-artista");
        Route::post("update-artista/{date}/{id}","ArtistaController@update")->name("update-artista");

        // Crud Disqueras - Ajax
        Route::post("store-disquera/{date}","DisqueraController@store")->name("store-disquera");
        Route::post("show-disquera/{date}","DisqueraController@show")->name("show-disquera");
        Route::post("delete-disquera/{date}","DisqueraController@delete")->name("delete-disquera");
        Route::post("active-disquera/{date}","DisqueraController@active")->name("active-disquera");
        Route::post("update-disquera/{date}","DisqueraController@update")->name("update-disquera");

	});

});