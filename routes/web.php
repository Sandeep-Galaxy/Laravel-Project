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
})->name('root');

Auth::routes();

Route::get('/blog', 'BlogController@index')->name('blog');


Route::group(array('middleware' => ['auth', 'user']), function () {


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout');

Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

Route::get('/profile','ProfileController@index')->name('profile');
Route::post('/profile_update','ProfileController@update');

});

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']), function () {
		
		Route::get('', 'UsersController@index');

		Route::get('profile','ProfileController@index');

		Route::get('users','UsersController@users');

		Route::get('logout', 'UsersController@logout');

		Route::get('newpost','PostsController@newpost');
		Route::post('/post', 'PostsController@store');

		Route::get('posts','PostsController@index');


		Route::post('/profile_update','ProfileController@update');


});

