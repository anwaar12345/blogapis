<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
class Country extends Model
{
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
