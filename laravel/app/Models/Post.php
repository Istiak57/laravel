<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['post_name','updated_at','image','description','status','category_id'];


    public function category()
    {
    	return $this->belongsTo(category::class,'category_id');
    }
}
