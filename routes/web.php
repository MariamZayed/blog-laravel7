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

Route::resource('post', 'PostController');


/* Route::get('/', function () {
    $posts=[
        [
            "id"=>1,
            "title"=>"Learn Php",
            "Posted By"=>"Ahmed",
            "Created At"=>"2020-10-2"
        ],
        [    
            "id"=>2,
            "title"=>"Solid Principles",
            "Posted By"=>"Mohamed",
            "Created At"=>"2018-4-12"
        ],
        [
            "id"=>3,
            "title"=>"Design Pattern",
            "Posted By"=>"Ali",
            "Created At"=>"2018-4-13"
        ]
    ];
    return view('posts.index', 'PostController@index');
});
 */

// Route::get('/view',[PostController::class,'@show']);
/* Route::get('/view',PostController::class . '@show');


Route::get('/edit', function () {
    return view('posts.edit');
});
Route::get('/delete', function () {
    return view('posts.delete');
}); */