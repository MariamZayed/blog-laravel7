<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Posted By</th>     
            <th>Created At</th>
            <th>    </th>
            <th>Action</th>
            <th>    </th>

        </tr>
             @foreach($posts as $post)
                <tr>
                <td>{{$post->id}}</td> 
                 <td>{{$post->title}}</td>
                <td>{{$post->posted_by}}</td>
                <td>{{$post->created_by}}</td>
                <td><a class="btn btn-primary" href="/post/{{$post->id}}">show</a></td>
                <td><a class="btn btn-secondary" href="/post/{{$post->id}}/edit">Edit</a></td>

                <td>
                <form action="/post/{{$post->id}}" method="post"> 
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
                </td>   
                </tr>
                
            @endforeach
        </table>
        <a class="btn btn-light" href="/post/create">Add Post</a>
    </body>
</html>
 @endsection