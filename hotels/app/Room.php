<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;
class Room extends Model
{
    public function type()
    {
        $this->belongsTo('App\RoomType');
    }
}
