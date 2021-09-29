<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable=[
         "title","post_description","user_id"
     ];

     public function user()//بالطريقه ديه انا بعمل حركة الريلايشنز
                           // هقدر اروح عند الفيو واقوله بوست -سهم- يوز-سهم اسم اليوزر
                         // كنت بعمل كده لما ارمي اوبجكت من الكنترولر بالفنكشن الي اسمها كومباكت لكن مش هقدرارمي حاجه ملهاش علاقه من الكنترولر
                         // الحركه ديه معناها اني معدت شعايزه اعمل حركة الانير جوين
     {
         return $this->belongsTo('App\User');
     }
 
}
