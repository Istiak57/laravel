<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
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
    	return view('contact');
    }

    public function contactpost(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',

      ]);

        $contact = Message::insert([
          
          'username'=>$request->username,
          'email'=>$request->email,
          'subject'=>$request->subject,
          'message'=>$request->message,
          'created_at'=>Carbon::now(),

        ]);

        return back()->with('success_msg','message sent successfully!!');
    }
}
