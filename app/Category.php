<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Category extends Model
{
   public function posts()
   {
     return $this->hasMany('App\Post');
   }
   public function comments()
   {
      return $this->hasManyThrough('App\Comment','App\Post');
   }
}
