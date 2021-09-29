<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("post_description");//غيرتهها كان حرق الاس غلط
            $table->unsignedBigInteger('user_id');//كده ضيفت الكولوم الي نوعه من نفس نوع الاي دي الي في جدول اليوزر
                                                // كده ناقص اربطهم ببعض واخليه فورن كي
                                                // الحركه ديه غلط عشان لو انا شغاله على برودكشن هيشيل كل الداتا 
                                                // فهعمل ملف تاني ميجراشي واحد في الكود الي جاي الي هو بتاع الفورين كي
                                                // اسم الفيل add_user_id_to_posts_talbe
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
