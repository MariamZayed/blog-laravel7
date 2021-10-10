<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()//ده كونتسرتكتور, والميديل واير محطوط فيه فيما معناه انه لازم يعدي عليه قبل ميخش على الكود الي بعده
    //انا ممكن اعمله هناك فالويب فالنكشن الي اسمها ميدل واير عادي  حاجه
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/posts');
        //return view('home');//روح للروت الي اسمه بوستس (ري دايركتنج) وبعد كده وح للفنكشن بتاعت الاندكس هناك  وخلاص
        //انا ممكن اعمل الفيو هنا بس هككر الكود وكمان هكتب كود الداتابيز فليه تكرار
        // او ممكن اروح لكنترولر\اوث\لوج ان واغير الري دايركت هناك لاسن الروت زي هنا
    }
}
