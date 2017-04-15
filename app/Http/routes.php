<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/post', ['as' => 'post.index', 'uses' => 'PostController@showAllPosts']);
Route::get('/post/create', ['as' => 'post.create', 'uses' => 'PostController@createPost']);
Route::post('/post/insert', ['as' => 'post.insert', 'uses' => 'PostController@insertPost']);
Route::get('/post/delete/{id}', ['as' => 'post.delete', 'uses' => 'PostController@deletePost']);
Route::get('/post/edit/{id}', ['as' => 'post.edit', 'uses' => 'PostController@editPost']);
Route::post('/post/update/{id}', ['as' => 'post.update', 'uses' => 'PostController@updatePost']);
