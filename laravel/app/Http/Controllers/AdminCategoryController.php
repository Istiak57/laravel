<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\category;
use Illuminate\Cache\table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminCategoryController extends Controller
{
  //   public function __construct(){
    

  //   view()->composer(
  //     'frontend.layouts.frontend_master', 
  //     function ($view) {
  //       $view->with('tags', Tag::all())->with('categories',category::all());
  //     }
  //   );

    
  // }

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


    	return view('backend.category.index');
    }

    public function addcategorypost(Request $request)
    {

        $request->validate([
            
            'status'=>'required',
            'name'=>'required|unique:categories,name',

      ]);

     
    	category::insert([
          'name'=>$request->name,
          'status'=>$request->status,
          
    	]);

    	return back()->with('suc_msg','category added successfully');
    }

    public function managecategory()
    {
    	$categories = category::all();

    	return view('backend.category.manage', compact('categories'));
    }

    public function deletecategory($id)
    {

    	category::find($id)->delete();
    	return redirect('/manage/category')->with('delete_msg','category deleted successfully');
    }

    public function updatecategory($id)
    {
        
    	$category_by_id = category::find($id);


    	return view('backend.category.update', compact('category_by_id'));
    }

    public function updatecategorypost($id, Request $request)
    {
    	category::find($id)->update([

             'name'=>$request->name,
          'status'=>$request->status,

    	]);

       



    	return redirect('/manage/category')->with('update_msg','category updated successfully');
    }
}
