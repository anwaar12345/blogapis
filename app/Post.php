<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\category;
use App\Tag;
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
    public function tags()
    {
        return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id');
    }
}
