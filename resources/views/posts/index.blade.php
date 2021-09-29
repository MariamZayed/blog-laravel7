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
            <th>Description</th>
            <th>Posted By</th>     
            <th>    </th>
            <th>Options</th>
            <th>    </th>

        </tr>
             @foreach($posts as $post)
                <tr>
                <td>{{ $post->id }}</td> 
                 <td>{{ $post->title }}</td>
                <td>{{ $post->post_description }}</td>
                 <td>{{ $post->User->name }}</td> {{-- اقدر اعمل كده عشان انا جوا الموديل عملت فنكشن يوزر جواها ريلايشن شيبز كل كلاس جوا الجدول --}}
                <td><a class="btn btn-primary" href="/posts/{{ $post->id }}">show</a></td>
                <td><a class="btn btn-secondary" href="/posts/{{ $post->id }}/edit">Edit</a></td>

                <td>
                <form action="/posts/{{ $post->id }}" method="post"> 
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
                </td>   
                </tr>
                
            @endforeach
        </table>
        <a class="btn btn-light" href="/posts/create">Add Post</a>
    </body>
</html>
 @endsection