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
Route::get('/posts','PagesController@posts');
Route::get('/posts/{id}','PagesController@post');
Route::post('/posts/store','PagesController@store');
Route::post('/posts/{id}/store','CommentsController@store');
Route::get('/category/{name}','PagesController@category');