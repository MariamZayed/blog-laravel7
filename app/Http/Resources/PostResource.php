<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)//البشمهندسه متعرفش ايه الريكوست ده  والزيس بيشاور على الاراي او البوستس الي جايه
    {
        // here goes how I'm going to format to appear in json look in postman
        //or whatever tool it is
        return[
            'id'=>$this->id,
            //هات من الاراي البوستس الي جايه من الداتا بيز الي انا حولتها لجيسون في الكنترولر القيمه ديه
            'Title'=>$this->title,
            'Description'=>$this->post_description,
            'user'=>new UserResource($this->user)
            // ظبطت الكود اكتر وديته لليوزر ريسورس وهنادي عليه هنا عشان اوحد الاسامي ومكررش
            // مبعتش كولكشن
        ];
        //لو سبتها فاضيه هتروح هناك اراي فاضبه لاني معدلتش حاجه
        //هيبانوا دول بس وهيبانوا بالمسميات ديه بس
    }
}
