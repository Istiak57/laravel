<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class AdminSettingsController extends Controller
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
  	return view('backend.setting.index');
  }


    public function addsettingpost(Request $request)
   {

   	   

   	   
   	   $setting_id = Setting::insertGetId([

          'facebook_link'=>$request->facebook,
          'twitter_link'=>$request->twitter,
          'linkedin_link'=>$request->linkedin,
          'copy_right' =>$request->copyright,
          'logo' => Str::random(40),
          'created_at'=>Carbon::now(),

   	   ]);

       //image uploaded in uploads folder

       $uploaded_photo = $request->file('logo');
       $new_name = $setting_id.".".$uploaded_photo->getClientOriginalExtension();

       $new_upload_location = base_path('public/uploads/logo/'.$new_name);

       Image::make($uploaded_photo)->resize(600,470)->save($new_upload_location);

       Setting::find($setting_id)->update([
             'logo' => $new_name,
       ]);

       

   	   return back()->with('suc_msg','setting added successfully');
   }

   public function managesetting()
    {
      
    	$settings = Setting::first();


    	return view('backend.setting.manage', compact('settings'));
    }
  public function updatesettingpost($id, Request $request)
  {
  	  if ($request->hasFile('new_logo')) {
    	//old photo delete
        $setting_img_name = Setting::find($id)->logo;
        $setting_img_location = base_path('public/uploads/logo/'.$setting_img_name);
        unlink($setting_img_location);

        //end
        //new phoho

        $uploaded_photo = $request->file('new_logo');
       $new_name = $id.".".$uploaded_photo->getClientOriginalExtension();

       $new_upload_location = base_path('public/uploads/logo/'.$new_name);

       Image::make($uploaded_photo)->resize(600,470)->save($new_upload_location);

       //new image in db

       Setting::find($id)->update([

            
          'logo' => $new_name,

      ]);
     }




     else{

    	Setting::find($id)->update([

              'facebook_link'=>$request->facebook,
          'twitter_link'=>$request->twitter,
          'linkedin_link'=>$request->linkedin,
          'copy_right' =>$request->copyright,
          
          


    	]);
    }
    	return redirect('/manage/settings')->with('update_msg',' updated successfully');
  }
    
    
}
