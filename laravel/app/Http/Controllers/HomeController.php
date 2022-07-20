<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\RoleUser;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Tag;
use App\Models\User;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{

   function __construct(){
    

    view()->composer(
      'frontend.layouts.frontend_master', 
      function ($view) {
        
        $view->with('tags', Tag::all())->with('categories',category::all())->with('date',Carbon::now())
        ->with('settings',Setting::first());
      }
    );
  }
    public function index()
    {
        $categories = category::simplePaginate(2);
        $posts = Post::all();
        $tags = Tag::all();
        $latestposts = Post::latest()->get();
        $nationalposts = Post::where('category_id',4)->get();
        $internationalposts = Post::where('category_id',5)->get();
        $moviesposts = Post::where('category_id',2)->get();
        $sportsposts = Post::where('category_id',1)->get();
    	return view('welcome', compact('categories','posts','tags','latestposts','nationalposts','internationalposts','moviesposts','sportsposts'));
    }

    // public function index2()
    // {
    //   $tags = Tag::all();
    //   return view('frontend.layouts.frontend_master', compact('tags'));
    // }


    public function signin()
    {
      if (Auth::check()) {
        return redirect()->back();
      }else{
        return view('signin');
      }
    	
    }



    public function signup()
    {
    	if (Auth::check()) {
        return redirect()->back();
      }else{
        return view('signup');
      }
    }

    public function dashboard()
    {
        // $asd = Auth::user()->roles;
        // foreach ($asd as $userdata) {
        //   dd($userdata->role_name);
        // }
         
        return redirect('/admindashboard');
    }

   

    public function registration(Request $request)
    {
      $request->validate([
            'user_name'=>'required|min:8|max:50',
            'password'=>'required|min:8|max:50',
            'user_email'=>'required|email|unique:users,email|min:8|max:50',

      ]);

       $user2id = User::insertGetId([

           'username'=>$request->user_name,
           'email'=>$request->user_email,
           'password'=>Hash::make($request->password),
           

        ]);
       $profile_id = Profile::insertGetId([

           'fullname'=>$request->user_name,
           'user_id'=>$user2id,
           
           

        ]);
       
       $setroll = DB::table('role_user')->insert([
    'user_id' => $user2id,
    'role_id' => 3
     ]);



        return back()->with('success_msg','registration complete!!');
    }

    public function userlogin(Request $request)

    {
      $request->validate([
            
            'password'=>'required|min:8|max:50',
            'email'=>'required|email|min:8|max:50',

      ]);

           $remmember_me = $request->has('remember_me') ? true : flase;

           $check = $request->only('email','password');

       if (Auth::attempt($check, $remmember_me)) {
         
         
          return redirect('/');
        

       }
        else{
             return back()->with('neg_msg2','user not found!!');
        }

        
       
        
    }

    public function student_delete($id)
    {
        Student::find($id)->delete();
        return redirect('/dashboard')->with('delted_msg','student deleted successfully');


    }

    public function student_update($id)
    {
        $stu_by_id = Student::find($id);
        

        return view('student.update',compact('stu_by_id'));
    }


     public function student_update_post($id, Request $request)
    {
         Student::find($id)->update([
             'username'=>$request->user_name,
           'useremail'=>$request->user_email,
           'password'=>$request->password,
           'address'=>$request->address,
           'phone'=>$request->phone,


         ]);
        

        return redirect('/dashboard')->with('update_msg','student information updated successfully');
    }


   public function categorywisepost($id)
   {
       $category_by_ids = category::find($id);
       $posts = category::find($id)->posts()
                    ->where('category_id', $id)
                    ->get();

       return view('categorypost',compact('category_by_ids','posts'));

   }

   public function singlepost($id)
   {
     $singlepost = Post::find($id);

     return view('category_singlepost',compact('singlepost'));
   }

   public function search(Request $request)
   {
     $search = $request->input('search');
     $items = Post::query()
        ->where('post_name','LIKE' ,"%{$search}%")
       
        ->get();

     return view('searchpost',compact('search','items'));
   }

   public function tagwisepost($id)
   {
      $tag_by_ids = Tag::find($id);
       $tagjoints = DB::table('tag_and_posts')
            ->join('tags', 'tag_id', '=', 'tags.id')
            ->join('posts', 'post_id', '=', 'posts.id')
            ->where('tags.id', '=', $id)
            ->get();
     
           return view('tagpost',compact('tagjoints','tag_by_ids'));
   }


}
