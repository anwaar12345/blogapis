<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RoomTypw;
use App\Reservation;
class Room extends Model
{
    public function type()
    {
        $this->belongsTo('App\RoomType');
    }
    public function reservations()
    {
      return $this->belongsToMany('App\Reservation');
    }
}
