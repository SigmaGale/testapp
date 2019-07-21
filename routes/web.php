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

/*Route::get('/users/{id}/{name}', function ($id,$name) {
    return "This is user number ". $id . "and his name is ". $name;
});*/

Route::get('/', 'PagesController@index');
Route::get('/login','PagesController@login');


Route::resource("/users",'UsersController');
Route::resource("/posts","PostsController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
