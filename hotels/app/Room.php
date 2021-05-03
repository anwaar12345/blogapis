<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RoomType;
use App\Reservation;
use App\Hotel;
class Room extends Model
{
    public function type()
    {
       return $this->belongsTo('App\RoomType','room_type_id','id');
    }
    public function reservations()
    {
      return $this->belongsToMany('App\Reservation');
    }
    public function hotel()
    {
      return $this->belongsTo('App\Hotel');
    }
}
