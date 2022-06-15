<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/home', 'PageController@index');

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create')->middleware('auth');
Route::post('/posts', 'PostController@store');

// show edit form
Route::get('/posts/{post}/edit', 'PostController@edit');
// update post
Route::put('/posts/{post}', 'PostController@update');
// delete post
Route::delete('/posts/{post}', 'PostController@destroy');
// Manage Post
Route::get('/posts/manage', 'PostController@manage')->middleware('auth');
// single post
Route::get('/posts/{post}', 'PostController@show');
// show Register create form
Route::get('/register', 'UserController@create');
// create new user
Route::post('/users', 'UserController@store');
// logout 
Route::post('/logout', 'UserController@logout');
// show login form 
Route::get('/login', 'UserController@login')->name('login');
// Log in user
Route::post('/users/authenticate', 'UserController@authenticate');
// 404 page
Route::fallback( function () {
    return view('components.404-page');
});

// for like
Route::post('/posts/{post}/likes', 'PostLikeController@store');
Route::delete('/posts/{post}/likes', 'PostLikeController@destroy');