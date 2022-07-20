<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminTagsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomecategoryController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'index']);
Route::get('signin', [HomeController::class,'signin'])->name('signin');
Route::get('signup', [HomeController::class,'signup'])->name('signup');
Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');
Route::post('registration', [HomeController::class,'registration'])->name('registration');
Route::post('userlogin', [HomeController::class,'userlogin'])->name('userlogin');
Route::get('logout', [AdminController::class,'logout']);


//
Route::get('student_delete/{id}',[HomeController::class,'student_delete']);
Route::get('student_update/{id}',[HomeController::class,'student_update']);
Route::post('student_update/post/{id}',[HomeController::class,'student_update_post']);

//homecategory
Route::get('home/categories', [HomecategoryController::class,'index']);

//admin
Route::get('/admindashboard', [AdminController::class,'index'])->middleware('Basicauth');
//admin category
Route::get('/add/category', [AdminCategoryController::class,'index'])->middleware('Basicauth');
Route::post('/add/category/post', [AdminCategoryController::class,'addcategorypost'])->middleware('Basicauth');
Route::get('/manage/category', [AdminCategoryController::class,'managecategory'])->middleware('Basicauth');
Route::get('/delete/category/{id}', [AdminCategoryController::class,'deletecategory'])->middleware('Basicauth');
Route::get('/update/category/{id}', [AdminCategoryController::class,'updatecategory'])->middleware('Basicauth');
Route::post('/update/category/post/{id}', [AdminCategoryController::class,'updatecategorypost'])->middleware('Basicauth');

//admin tags
Route::get('/add/tags', [AdminTagsController::class,'index'])->middleware('Basicauth');
Route::post('/add/tags/post', [AdminTagsController::class,'addtagspost'])->middleware('Basicauth');
Route::get('/manage/tags', [AdminTagsController::class,'managetags'])->middleware('Basicauth');
Route::get('/delete/tags/{id}', [AdminTagsController::class,'deletetags'])->middleware('Basicauth');
Route::get('/update/tags/{id}', [AdminTagsController::class,'updatetags'])->middleware('Basicauth');
Route::post('/update/tags/post/{id}', [AdminTagsController::class,'updatetagspost'])->middleware('Basicauth');

// admin Post 

Route::get('/add/posts', [AdminPostsController::class,'index'])->middleware('Basicauth');
Route::post('/add/posts/post', [AdminPostsController::class,'addpostspost'])->middleware('Basicauth');
Route::get('/manage/posts', [AdminPostsController::class,'manageposts'])->middleware('Basicauth');
Route::get('/delete/posts/{id}', [AdminPostsController::class,'deleteposts'])->middleware('Basicauth');
Route::get('/update/posts/{id}', [AdminPostsController::class,'updateposts'])->middleware('Basicauth');
Route::post('/update/posts/post/{id}', [AdminPostsController::class,'updatepostspost'])->middleware('Basicauth');

//frontendcategorywise post
Route::get('/category/{id}', [HomeController::class,'categorywisepost']);
Route::get('/category/post/{id}', [HomeController::class,'singlepost']);
Route::post('/search', [HomeController::class,'search']);
Route::get('/tag/{id}', [HomeController::class,'tagwisepost']);

//settings 
Route::get('add/settings', [AdminSettingsController::class,'index'])->middleware('Basicauth');
Route::get('manage/settings', [AdminSettingsController::class,'managesetting'])->middleware('Basicauth');
Route::post('/add/settings/post', [AdminSettingsController::class,'addsettingpost'])->middleware('Basicauth');
Route::post('/update/setting/post/{id}', [AdminSettingsController::class,'updatesettingpost'])->middleware('Basicauth');

//homepage profile
Route::get('home/profile', [UserProfileController::class,'index']);
Route::get('home/profile/edit/{id}', [UserProfileController::class,'editprofile']);
Route::post('home/profile/edit/post/{id}', [UserProfileController::class,'editprofilepost']);

//home page contact
Route::get('message/list', [AdminController::class,'messagelist']);
Route::get('contact', [ContactController::class,'index']);
Route::post('contact/post', [ContactController::class,'contactpost']);




//admin usermanage
Route::get('manage/users', [AdminController::class,'manageusers']);
Route::get('user/edit/{id}', [AdminController::class,'edituser']);
Route::post('edit/user/post/{id}', [AdminController::class,'edituserpost']);
