<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTagsController extends Controller
{
//      public function __construct(){
//      view()->composer('backend.layouts.adminmaster', function ($view)
//      {
//       foreach (Auth::user()->roles as $userdata) {
//           $role = $userdata->role_name;
//           $view->with('role',$role );

         
//         }       
//      });
    
// }


    public function index()
    {
    	return view('backend.tags.index');
    }

    public function addtagspost(Request $request)
    {
    	Tag::insert([
          'tag_name'=>$request->name,
          'status'=>$request->status,
          
    	]);

    	return back()->with('suc_msg','tag added successfully');
    }

    public function managetags()
    {
    	$tags = Tag::all();

    	return view('backend.tags.manage', compact('tags'));
    }

    public function deletetags($id)
    {

    	Tag::find($id)->delete();
    	return redirect('/manage/tags')->with('delete_msg','tag deleted successfully');
    }

     public function updatetags($id)
    {
    	$tag_by_id = Tag::find($id);

    	return view('backend.tags.update', compact('tag_by_id'));
    }

     public function updatetagspost($id, Request $request)
    {
    	Tag::find($id)->update([

             'tag_name'=>$request->name,
          'status'=>$request->status,

    	]);
    	return redirect('/manage/tags')->with('update_msg','Tag updated successfully');
    }
}
