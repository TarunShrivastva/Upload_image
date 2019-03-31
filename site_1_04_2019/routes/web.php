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
	Route::Resource('main_category','Admin\MainCategoryController');
});

	Route::Resource('fronthome','Frontend\HomePageController');
	Route::GET('{category}/{alias}','Frontend\CategoryPageController@show');
	Route::GET('{category}','Frontend\CategoryPageController@index');