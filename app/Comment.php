<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Comment extends Model
{
    public function comments()
    {
        return $this->belongsTo('App\Post');
    }
}
