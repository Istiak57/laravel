<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagAndPost;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
  public function __construct(){
     view()->composer('backend.layouts.adminmaster', function ($view)
     {
      foreach (Auth::user()->roles as $userdata) {
          $role = $userdata->role_name;
          $view->with('role',$role );

         
        }       
     });
    
}


    public function index()
    {
      $categories = category::all();
      $tags = Tag::all();
    	return view('backend.posts.index',compact('categories','tags'));
    }

    public function addpostspost(Request $request)
   {

   	   

   	   
   	   $post_id = Post::insertGetId([

          'post_name'=>$request->name,
          'category_id'=>$request->category_id,
          'status'=>$request->status,
          'description' =>$request->description,
          'image' =>$request->name,
          'created_at'=>Carbon::now(),

   	   ]);

       //image uploaded in uploads folder

       $uploaded_photo = $request->file('image');
       $new_name = $post_id.".".$uploaded_photo->getClientOriginalExtension();

       $new_upload_location = base_path('public/uploads/post_photos/'.$new_name);

       Image::make($uploaded_photo)->resize(600,470)->save($new_upload_location);

       Post::find($post_id)->update([
             'image' => $new_name,
       ]);

       foreach ($request->tag as $tag) {
         TagAndPost::insert([
             'tag_id'=>$tag,
             'post_id'=>$post_id,
         ]);
       }

   	   return back()->with('suc_msg','Post added successfully');
   }

     public function manageposts()
    {
      
    	$posts = Post::all();


    	return view('backend.posts.manage', compact('posts'));
    }

    public function deleteposts($id)
    {
        $post_img_name = Post::find($id)->image;
        $post_img_location = base_path('public/uploads/post_photos/'.$post_img_name);
    	Post::find($id)->delete();
    	unlink($post_img_location);
    	return redirect('/manage/posts')->with('delete_msg','post deleted successfully');
    }

    public function updateposts($id)
    {
    	$post_by_id = Post::find($id);
       $categories = category::all();

    	return view('backend.posts.update', compact('post_by_id','categories'));
    }

      public function updatepostspost($id, Request $request)
    {

       if ($request->hasFile('newimage')) {
    	//old photo delete
        $post_img_name = Post::find($id)->image;
        $post_img_location = base_path('public/uploads/post_photos/'.$post_img_name);
        unlink($post_img_location);

        //end
        //new phoho

        $uploaded_photo = $request->file('newimage');
       $new_name = $id.".".$uploaded_photo->getClientOriginalExtension();

       $new_upload_location = base_path('public/uploads/post_photos/'.$new_name);

       Image::make($uploaded_photo)->resize(600,470)->save($new_upload_location);

       //new image in db

       Post::find($id)->update([

            
          'image' => $new_name,

      ]);
     }




     else{

    	Post::find($id)->update([

             'post_name'=>$request->name,
          'status'=>$request->status,
          'category_id'=>$request->category_id,
          'description' =>$request->description,


    	]);
    }
    	return redirect('/manage/posts')->with('update_msg','post updated successfully');
    }

}
