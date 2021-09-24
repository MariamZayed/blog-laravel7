<body>
<form method="post" action="/post/{{$post->id}}">
    @csrf
    @method('PUT')
    <input type="te t" name="title" placeholder="title"><br>
    <input type="text" name="posted_by" placeholder="posted_by"><br>
  <input type="text" name="created_by" placeholder="created_by"><br><br>
    <input type="submit" value="Submit">
    <!-- لازم اسماء النايم يكونوا بالظبط شبه الي في الداتا بيز عشان الموديل بيقارن بالاسم بتاع الفورم بلي في الجدول المعين في الدتا بيز -->
</form> 
</body>