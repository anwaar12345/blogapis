<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\category;
class Post extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function category()
    {
       return $this->belongsTo('App\Category');
    }
}
