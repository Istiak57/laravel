<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;


class UserProfileController extends Controller
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
    	$user = Auth::user();
    	$user_profile =  DB::table('profiles')
            ->where('user_id', '=', $user->id)
            ->first();
            
    	return view("profile",compact('user','user_profile'));
    }


    public function editprofile($id)
    {
    	$edit_profile = Profile::find($id);
    	return view('profile_edit',compact('edit_profile'));
    }

    public function editprofilepost($id, Request $request)
    {
      $profile=Profile::where('id','=',$id);
      if($request->file('newimage')){

        $profile->update([
          'fullname'=>$request->name,
         'gender'=>$request->gender,
          'birthdate'=>$request->birthday,
          'address'=>$request->address,   

   	   ]);

        $uploaded_photo = $request->file('newimage');
        $new_name = $id.".".$uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/profile/'.$new_name);
        Image::make($uploaded_photo)->resize(600,470)->save($new_upload_location);
        $profile->update([
              'photo' => $new_name,
 
        ]);
      }

    	else{
     		$profile->update([
          'fullname'=>$request->name,
         'gender'=>$request->gender,
          'birthdate'=>$request->birthday,
          'address'=>$request->address,   

   	   ]);

    	}

    	return redirect('home/profile');
    }
}
