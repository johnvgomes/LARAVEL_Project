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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

###################     rotas do cliente     #######################

Route::get('clientes', 'ClientesController@index');

Route::get('clientes/{cliente}/editar', 'ClientesController@editar');

Route::get('clientes/novo', 'ClientesController@novo');

Route::get('clientes/{cliente}/confirmDelete', 'ClientesController@confirmarDelete');

Route::post('clientes/salvar', 'ClientesController@salvar');

Route::patch('clientes/{cliente}', 'ClientesController@atualizar');

Route::delete('clientes/{cliente}', 'ClientesController@deletar');

#################### ###################### #######################

###################     rotas da categoria  #######################


Route::get('categories', 'CategoriesController@index');

Route::get('categories/{category}/editar', 'CategoriesController@editar');

Route::get('categories/novo', 'CategoriesController@novo');

Route::get('categories/{category}/confirmDelete', 'CategoriesController@confirmarDelete');

Route::post('categories/salvar', 'CategoriesController@salvar');

Route::patch('categories/{category}', 'CategoriesController@atualizar');

Route::delete('categories/{category}', 'CategoriesController@deletar');

#################### ###################### #######################

###################     rotas do produto  #######################


Route::get('products', 'ProductsController@index');

Route::get('products/novo', 'ProductsController@novo');

Route::get('products/{product}/editar', 'ProductsController@editar');

Route::get('products/{product}/confirmDelete', 'ProductsController@confirmarDelete');

Route::post('products/salvar', 'ProductsController@salvar');

Route::patch('products/{product}', 'ProductsController@atualizar');

Route::delete('products/{product}', 'ProductsController@deletar');

#################### ###################### #######################