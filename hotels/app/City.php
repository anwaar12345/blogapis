<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hotel;
class City extends Model
{
    public function hotels()
    {
       return $this->hasMany('App\Hotel');
    }
}
