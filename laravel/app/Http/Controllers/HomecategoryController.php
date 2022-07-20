<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Tag;
use App\Models\category;
use Illuminate\Http\Request;

class HomecategoryController extends Controller
{
	   function __construct(){
    

    view()->composer(
      'frontend.layouts.frontend_master', 
      function ($view) {
        
        $view->with('tags', Tag::all())->with('categories',category::all())
        ->with('settings',Setting::first());
      }
    );
  }
    public function index()
    {
       $categories = category::all();
    	return view('categories',compact('categories'));
    }
}
