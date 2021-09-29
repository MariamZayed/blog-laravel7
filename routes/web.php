<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resource('posts', 'PostController');

// Route::get('/', function () {
//     return redirect('/posts');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
