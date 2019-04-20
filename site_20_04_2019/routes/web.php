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
Route::middleware(['auth'])->group(function () {
	Route::Resource('category','Admin\CategoryController');
	Route::Resource('articles','Admin\ArticleController');
	Route::get('/statusUpdate','Admin\ArticleController@statusUpdate');
	Route::Resource('contenttype','Admin\ArticleCategoryController');
	Route::Resource('authors','Admin\AuthorController');
	Route::Resource('front-module','Admin\MenuController');
	Route::Resource('module','Admin\ModuleController');
});
	
	
	Route::group(['prefix' => '{locale}'], function () {
	    Route::GET('/{category}/{subcategory?}','Transend\CategoryPageController@index');
		Route::GET('/{category?}/{subcategory}/{alias}-{id}','Frontend\CategoryPageController@show')->where(['id' => '[0-9]+', 'alias' => '[a-z,-]+'])->name('trans-single-article');
	});

	Route::GET('{category}/{subcategory?}','Frontend\CategoryPageController@index');
	Route::GET('{category}/{subcategory}/{alias}-{id}','Frontend\CategoryPageController@show')->where(['id' => '[0-9]+', 'alias' => '[a-z,-]+'])->name('single-article');
	

	