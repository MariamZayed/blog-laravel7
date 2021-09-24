<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Symfony\Contracts\Service\Attribute\Required;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()// بجمع الداتا واعرضها او ابعتها للفيو وخلاص
    {
        $posts =Post::all();// all is function in model
                            // ديه بدل مكنا بنبعت الداتا في الروت هناك  وده الصح اصلا كله فالكنترولر
                            // هاخد كل حاجه من الجدول بتاع بوست وابعتها للاندكس
                            //ممكن ااكسسها ك اراي وممكن ك اوبجكت

        return view("posts.index",compact('posts'));
    }

    public function create()// شغلانتها انها تعرضلي صفحة الكريت بس, يعني من غير داتا بيز او اي حاجه مجرد فيو
    {
        return view("posts.create");
    }

    public function store(Request $request)// لما اعمل سيبمت للفورم بتاعت ادد وفي حالتنا هنا بوست
    {                                     // الركوست بتبقى شايله الداتا بتاعتي الي جايه من على الفورم
        // عايزه اكونكت على الداتا بيز واعمل فاليديشن وانسيرت الداتا وارجع لصفحة بتاعت الكنترولر
        $request->validate([
                'title'=>'required|string|max:100|min:5',
               'posted_by'=>'required|string|max:100|min:3',
                'created_by'=>'required|string|max:100|min:3'
            ]);

        $data = $request->all();
        Post::create($data);// create is function
                            // insert query
                           //خد الداتا من الفورم وخزنها في جدول الفورم  بدل كويري انسيرت بفنكشن كريت
                           //هروح للبوست مودل عشان اقوله مين الداتا الي مسموح تتملى في الداتا بيز
        return redirect('/post');

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



    public function update(Request $request, $id)// طالما في داتا جايه يبقى هاخد الريكوست الي قيه الدات
                                                // ده لو عايزه اطغط على زرار الابديت او السبمت بتاعت الفورم
                                                 //بعمل كونفيرم لداتا الي هتعدل
    {
        $request->validate([
                "title" => 'required|min:3'
                    ]);
        
        $post =Post::find($id); // فايند البوست الي انا عايزه اعدل فيه
        $post->title= $request->title;
        $post->posted_by= $request->posted_by;
        $post->created_by= $request->created_by;
        $post->save();
        return redirect('/post');

    }

    public function destroy($id)
    {
        Post::destroy($id);     
        return redirect('/post');
    }
}
