<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class, 'reservations');
    }
}
