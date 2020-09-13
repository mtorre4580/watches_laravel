<?php

/*
|--------------------------------------------------------------------------
| Rutas App
|--------------------------------------------------------------------------
|
| Se encuentran todas las rutas de la aplicación.
| Se utiliza el middleware de autenticación si la acción requiere autenticación
|
*/

Route::get('/', [
    'as' => 'home.index',
    'uses' => 'HomeController@index'
]);

Route::get('noticias', [
	'as' => 'noticias.index',
	'uses' => 'NoticiasController@index',
]);

Route::get('noticias/categoria/{idCategoria}', [
	'as' => 'noticias.filtrarPorCategoria',
	'uses' => 'NoticiasController@filtrarPorCategoria'
]);

Route::get('noticias/detalle/{id}', [
	'as' => 'noticias.verDetalle',
	'uses' => 'NoticiasController@verDetalle'
]);

Route::get('noticias/detalle/{idNoticia}/comentario/cancelar' , [
	'as' => 'noticias.verDetalle.cancelarEdicion',
	'uses' => 'ComentariosController@doCancelar'
])->middleware('auth');

Route::get('noticias/buscar', [
	'as' => 'noticias.buscar',
	'uses' => 'NoticiasController@buscar'
]);

Route::get('cuidados', [
	'as' => 'cuidados.index',
	'uses' => 'CuidadosController@index'
]);

Route::get('marcas', [
	'as' => 'marcas.index',
	'uses' => 'MarcasController@index'
]);

Route::get('login', [
	'as' => 'login',
	'uses' => 'AuthController@index'
]);

Route::post('login', [
	'as' => 'auth.autenticar',
	'uses' => 'AuthController@autenticar'
]);

Route::get('registrar', [
	'as' => 'registrar',
	'uses' => 'AuthController@doRegistrar'
]);

Route::post('registrar', [
	'as' => 'auth.registrar',
	'uses' => 'AuthController@registrar'
]);

Route::get('logout', [
	'as' => 'auth.logout',
	'uses' => 'AuthController@cerrarSesion'
]);

Route::middleware(['admin'])->prefix('panel')->group(function() {
	Route::get('', [
		'as' => 'panel.index',
		'uses' => 'PanelController@index',
	]);
	Route::get('editar/{id}', [
		'as' => 'panel.formEditar',
		'uses' => 'PanelController@formEditar',
	]);
	Route::get('agregar', [
		'as' => 'panel.formAgregar',
		'uses' => 'PanelController@formAgregar',
	]);
});

Route::middleware(['auth'])->prefix('api/noticia')->group(function() {
	Route::post('', [
		'as' => 'noticias.agregar',
		'uses' => 'NoticiasController@agregar',
	]);
	Route::put('{id}', [
		'as' => 'noticias.editar',
		'uses' => 'NoticiasController@editar',
	]);
	Route::delete('{id}', [
		'as' => 'noticias.eliminar',
		'uses' => 'NoticiasController@eliminar',
	]);
});

Route::middleware(['auth'])->prefix('api/comentario')->group(function() {
	Route::post('', [
		'as' => 'comentarios.agregar',
		'uses' => 'ComentariosController@agregar',
	]);
	Route::put('{id}', [
		'as' => 'comentarios.editar',
		'uses' => 'ComentariosController@editar',
	]);
	Route::delete('{id}', [
		'as' => 'comentarios.eliminar',
		'uses' => 'ComentariosController@eliminar',
	]);
});