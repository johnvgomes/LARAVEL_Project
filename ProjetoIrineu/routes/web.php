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


###################     rotas da categoria  #######################

Route::resource('categories', 'CategoriesController');

Route::get('categories/{category}/confirmDestroy', 'CategoriesController@confirmDestroy');

#################### ###################### #######################

###################     rotas do produto  #######################

Route::resource('products', 'ProductsController');

Route::get('products/{product}/confirmDestroy', 'ProductsController@confirmDestroy');

#################### ###################### #######################

################### rotas da necessidade especial #################

Route::resource('specialneeds', 'SpecialNeedController');

Route::get('specialneeds/{specialneed}/confirmDestroy', 'SpecialNeedController@confirmDestroy');
#################### ###################### #######################

###################     rotas do processo seletivo  #######################

Route::resource('selectiveprocesses', 'SelectiveProcessController');
Route::get('selectiveprocesses/{selectiveprocess}/confirmDestroy', 'SelectiveProcessController@confirmDestroy');

#################### ###################### #######################
###################     rotas da inscrição  #######################

Route::resource('subscriptions', 'SubscriptionController');
Route::get('subscriptions/{subscription}/confirmDestroy', 'SubscriptionController@confirmDestroy');

#################### ###################### #######################
###################     rotas do profile  #######################

Route::resource('profiles', 'ProfileController');
Route::get('profiles/{profile}/confirmDestroy', 'ProfileController@confirmDestroy');

#################### ###################### #######################

###################     rotas da cotas  #######################

Route::resource('quotas', 'QuotaController');
Route::get('quotas/{quota}/confirmDestroy', 'QuotaController@confirmDestroy');
