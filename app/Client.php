<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable=['mobile','country','gender','avatar_image','user_id'];

    public function room()
    {
        return $this->belongsToMany(Room::class, 'reservations');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
