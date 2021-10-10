<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;









Route::resource('posts', 'PostController');

// Route::get('/', function () {
//     return redirect('/posts');
// });

Auth::routes();//ده اتعمل تلقائي لما عملن اليو اي بوتستراب وبعدين الاوث من الكمبوزر 

Route::get('/home', 'HomeController@index')->name('home');//روحي للهوم  كنترولر 