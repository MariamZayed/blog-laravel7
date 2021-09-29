<body>
@extends('layouts.app')
@extends('layouts.errors')
@section('content')

<form method="post" action="/posts">
    @csrf
    <input type="text" name="title" placeholder="title"><br>
    <input type="text" name="post_description" placeholder="What are you thinking about!" style="width:400;height:200;"><br>
    <input type="submit" value="Submit">
    <!-- لازم اسماء النايم يكونوا بالظبط شبه الي في الداتا بيز عشان الموديل بيقارن بالاسم بتاع الفورم بلي في الجدول المعين في الدتا بيز -->
</form> 
@endsection
</body>