<?php

namespace App;
use App\Room;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   public function rooms()
   {
        return $this->belongsToMany('App\Room');
   }
}
