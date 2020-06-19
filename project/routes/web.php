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
Route::get('/blog/pdf/{id}', ["uses" => '\App\Http\Controllers\BlogController@exportPdf', "as" => 'exportPdf']);
Route::get('/blogAsPdf', function($data) {
    return view('blogAsPdf', $data);
});

Route::get('/users', '\App\Http\Controllers\HomeController@showUsers');
Route::get('users/export/', '\App\Http\Controllers\HomeController@export');
Route::get('deleteUser/{id}', ["uses" => '\App\Http\Controllers\HomeController@deleteUser', "as" => 'deleteUser']);



Route::get('/profile/{id}', ["uses" =>  '\App\Http\Controllers\DatabaseController@getUserProfile', "as" => 'profile']);
Route::get('/profileEdit/{id}', ["uses" => '\App\Http\Controllers\DatabaseController@getUserProfileToEdit', "as" => 'profileEdit']);
Route::post('/profileChanged', '\App\Http\Controllers\DatabaseController@save');

Route::post('Logout', '\App\Http\Controllers\DatabaseController@logout');

Auth::routes();

