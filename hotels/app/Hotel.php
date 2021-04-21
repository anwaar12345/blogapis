<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;
 
class Hotel extends Model
{
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
