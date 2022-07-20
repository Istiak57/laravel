<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
    	return view('backend.index');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('signin');
    }

    public function manageusers()
    {
         $users = User::all();
         return view('backend.users.manageusers',compact('users'));
    }

    public function edituser($id)
    {
         $user = User::find($id);
         $role = DB::table('role_user')->where('user_id', $id)->first();
        
         $roles = Role::all();
         return view('backend.users.editusers',compact('user','role','roles'));
    }

    public function edituserpost($id, Request $request)
    {
        $update_role = DB::table('role_user')
              ->where('user_id', $id)
              ->update(['role_id' => $request->role]);

        return redirect('manage/users');
    }

    public function messagelist()
    {
        $messages = Message::latest()->get();

        return view('backend.message.index',compact('messages'));
    }


}
