<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class PostController extends Controller
{
    public function index()// بجمع الداتا واعرضها او ابعتها للفيو وخلاص
    {
        $user = Auth::id(); // عملت امبروت ليها. ده معناه ان اليوزر الي عمل *لوج ان* هات الاي دي بتاعه من الداتا بيز
        $posts =Post::all(); // all is function in model
                            // ديه بدل مكنا بنبعت الداتا في الروت هناك  وده الصح اصلا كله فالكنترولر
                            // هاخد كل حاجه من الجدول بتاع بوست وابعتها للاندكس
                            //ممكن ااكسسها ك اراي وممكن ك اوبجكت

        return view("posts.index",compact('posts'));
    }



    public function create()// شغلانتها انها تعرضلي صفحة الكريت بس, يعني من غير داتا بيز او اي حاجه مجرد فيو
    {   
        $users = User::all();
        return view("posts.create",compact('users'));
    }

//كريت مع ستور

    public function store(PostRequest $request)// لما اعمل سيبمت للفورم بتاعت ادد وفي حالتنا هنا بوست
    {                                     // الركوست بتبقى شايله الداتا بتاعتي الي جايه من على الفورم
                                        // عايزه اكونكت على الداتا بيز واعمل فاليديشن وانسيرت الداتا وارجع لصفحة بتاعت الكنترولر
        // $request->validate([
        //         'title'=>'required|string|max:100|min:3',
        //         'post_description'=>'required|string|max:300|min:3'
        //     ]);
                                        // فنكشن الفاليديشن ودتها ل HTTP\Requests\PostRequest

        $data = $request->all();
        Post::create(
            [
                'title'=>$request->title,
                'post_description'=>$request->post_description,
                'user_id'=> Auth::id()//لازم اباصي ديه عشان في التايبل هناك بعد محطيت الفورين كي لازم اباصيله الفورين كي الي هو هنا يعني اليوزر اي دي لجدول البوست
            ]
        );                  // create is function
                            // insert query
                           //خد الداتا من الفورم وخزنها في جدول الفورم  بدل كويري انسيرت بفنكشن كريت
                           //هروح للبوست مودل عشان اقوله مين الداتا الي مسموح تتملى في الداتا بيز
        return redirect('/posts');

    }





    public function show($id)// اشو ون اليمنت, يعني بوست واحد
    {
        $post= Post::find($id);
        return view("posts.show",compact("post"));
    }





    
    public function edit($id)//ده يدوب بس هشوف الصفحه بتاعة الايديت 
                            // فعشان كده هاخد الداتا واوديها للفيو بس
                            //  ده عشان يروح لفنكشن الابديت وبعد منها يتعمل كونفيرم عليهم
                            // يعني احنا هنا بن سلكت الداتا بس الي هيعمل عليهم كونفيرم
    {
        // $post= Post::where("id",$id)->first();
        $post= Post::where("id",$id)->first();
        return view("posts.edit",compact("post"));
    }

// ايديت مع ابديت

    public function update(PostRequest $request, $id)// طالما في داتا جايه يبقى هاخد الريكوست الي قيه الدات
                                                // ده لو عايزه اطغط على زرار الابديت او السبمت بتاعت الفورم
                                                 //بعمل كونفيرم لداتا الي هتعدل
    {
        // $request->validate([
        //         "title" => 'required|min:3'
        //             ]);
        //وديته ل App\Http\Requests\PostRequest;

        
        $post =Post::find($id); // فايند البوست الي انا عايزه اعدل فيه
        $post->title= $request->title;
        $post->post_description= $request->post_description;
        $post->user_id= Auth::id();
        $post->save();
        return redirect('/posts');

    }

    public function destroy($id)
    {
        Post::destroy($id);     
        return redirect('/posts');
    }
}
