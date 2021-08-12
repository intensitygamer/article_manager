<?php

use Illuminate\Support\Facades\Route;

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

 
Route::get('/', 'HomeController@index')->name('home');


Route::get('/login', function () {
    return view('auth.login');
}); 

Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);

Route::middleware('auth.basic')->group(function(){

	Route::get('articles_show/{id}',        [ 'as' => 'article.show',    'uses' => 'ArticleController@show']);

	Route::get('article',  [ 'as' => 'create_article',        'uses' => 'ArticleController@create_article']);

	Route::post('save_article',   [ 'as' => 'save_article',          'uses' => 'ArticleController@store']);

	Route::get('edit_article/{id}',    [ 'as' => 'edit.article',          'uses' => 'ArticleController@edit']);

	Route::post('update_article', [ 'as' => 'update.article',        'uses' => 'ArticleController@update']);

	Route::get('articles',        [ 'as' => 'articles',              'uses' => 'ArticleController@index']);
	
	Route::get('dashboard',        [ 'as' => 'dashboard',              'uses' => 'HomeController@index']);


	Route::delete('delete_article/{id}', [ 'as' => 'delete.article', 'uses' => 'ArticleController@destroy']);

	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

});


 
 Auth::routes();

// Route::get('clients.dashboard', [ 'as' => 'article.dashboard',  'uses' => 'ArticleController@dashboard']);
 
