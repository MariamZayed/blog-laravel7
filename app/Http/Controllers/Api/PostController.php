<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Http\Resources\PostResource;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::Collection($posts);
        //collection is function belongs to Resource that converts *array* coming from DB to json
        //collection is function, Postresource is going to format the upcoming json array to how I like
    }

    public function show($id)
    {
        $post = Post::find($id);
        return new PostResource($post);// no collection cause it's one coming object
    }

    public function destroy($id)
    {
        return Post::destroy($id);     
    }
}
