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

// Route::resource('clientes', 'ClientesController');

#################### ###################### #######################

###################     rotas da categoria  #######################

Route::resource('categories', 'CategoriesController');

#################### ###################### #######################

###################     rotas do produto  #######################

Route::resource('products', 'ProductsController');

#################### ###################### #######################

################### rotas da necessidade especial #################

Route::resource('specialneeds', 'SpecialNeedController');

#################### ###################### #######################

