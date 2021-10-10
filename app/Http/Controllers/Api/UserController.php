<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\RetryMiddleware;

class UserController extends Controller//علمت كنترولر على الموديل التاني الي موجود عندي
{
    public function index()
    {
        $users= User::all();
        return UserResource::collection($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }
}
