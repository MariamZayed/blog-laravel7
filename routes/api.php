<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\Http\Controllers\Api\PostController;//لازم اعمل تحت فالكنترولر مكان الكمنرولر فين مع ان يعملت اليوز ديه!
use App\Http\Resources\PostResource;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\TokenRequest;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/posts', function () {
//   return Post::all();
// });

///////***الملف ده يخص بتوع الموبايل ديفلوبرز****////////

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts','Api\PostController@index')->middleware('auth:sanctum');
Route::post('/posts','Api\PostController@store')->middleware('auth:sanctum');
Route::get('/posts/{id}','Api\PostController@show')->middleware('auth:sanctum');
Route::delete('/posts/{id}','Api\PostController@destroy')->middleware('auth:sanctum');

Route::get('/users','Api\UserController@index');//  هو هنا انا الي لسه مكريه الروت يعني اعتقد لو عملت روت
                                                // لست مش هيبان فيهم بس لاني بقوله ببساطه لما تروح اللينك ده في بوستمان روح اعمل كذا
Route::get('/users/{id}','Api\UserController@show');



Route::post('/sanctum/token', function (TokenRequest $request) {
    //ده راوت بوست هو الي عامله
    //وعملته ركوست جديد عشان يبقى مخصص ليه بس ووديته هناك
    // لوالفالديشن من التوكين ركوست نجح روح لسطر الي بعده

    $user = User::where('email', $request->email)->first();
    //بيتشك هل اليوزر ده عنده الايميل ده بتاعه فعلا ولا لاه

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    // لو مفيش يوزر ولو الباسورد بتاعه مش بيماتش مع يوزر الي متخزن فالداتابيز اطلع برا

    return $user->createToken($request->device_name)->plainTextToken;
    //لو اليوزر متسجل خلاص اديله توكين
});