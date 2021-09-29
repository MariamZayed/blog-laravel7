<body>
<form method="post" action="/posts/{{$post->id}}">
    @csrf
    @method('PUT')
    <input type="text" name="title" placeholder="Edit your title"><br>
    <input type="text" name="post_description" placeholder="Edit your description"><br>
    <input type="submit" value="Submit">
    <!-- لازم اسماء النايم يكونوا بالظبط شبه الي في الداتا بيز عشان الموديل بيقارن بالاسم بتاع الفورم بلي في الجدول المعين في الدتا بيز -->
</form> 
</body>