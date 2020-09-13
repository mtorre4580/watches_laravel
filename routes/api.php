<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// News
Route::get('noticias', 'Api\\NoticiasController@findAll');
Route::post('noticias', 'Api\\NoticiasController@save');
Route::get('noticias/{id}', 'Api\\NoticiasController@findById');
Route::delete('noticias/{id}', 'Api\\NoticiasController@delete');
Route::put('noticias/{id}', 'Api\\NoticiasController@update');

// Brands
Route::get('marcas', 'Api\\MarcasController@findAll');
Route::post('marcas', 'Api\\MarcasController@save');
Route::get('marcas/{id}', 'Api\\MarcasController@findById');
Route::delete('marcas/{id}', 'Api\\MarcasController@delete');
Route::put('marcas/{id}', 'Api\\MarcasController@update');

// Categories
Route::get('categorias', 'Api\\CategoriasController@findAll');
Route::post('categorias', 'Api\\CategoriasController@save');
Route::get('categorias/{id}', 'Api\\CategoriasController@findById');
Route::delete('categorias/{id}', 'Api\\CategoriasController@delete');
Route::put('categorias/{id}', 'Api\\CategoriasController@delete');
