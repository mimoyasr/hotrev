<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public function room()
    {
        return $this->belongsToMany(Room::class, 'reservations');
    }

}
