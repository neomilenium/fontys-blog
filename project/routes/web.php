<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



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

Route::get('/', '\App\Http\Controllers\DatabaseController@index');

Route::get('/home', '\App\Http\Controllers\DatabaseController@getUserHome');

Route::get('/blogs', '\App\Http\Controllers\BlogController@index');
Route::get('/createNewBlog', '\App\Http\Controllers\BlogController@newBlog');
Route::any('/blogCreated', '\App\Http\Controllers\BlogController@create');
Route::get('blog/{id}', ["uses" => '\App\Http\Controllers\BlogController@showBlog', "as" => 'blog']);

Route::get('/profile', '\App\Http\Controllers\DatabaseController@getUserProfile');
Route::get('/profileEdit', '\App\Http\Controllers\DatabaseController@getUserProfileToEdit');
Route::post('/profileChanged', '\App\Http\Controllers\DatabaseController@save');

Route::post('Logout', '\App\Http\Controllers\DatabaseController@logout');

Auth::routes();

