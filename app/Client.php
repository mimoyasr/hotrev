<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable=['mobile','country_id','gender','photo','user_id','approved_by','is_approved'];

    public function room()
    {
        return $this->belongsToMany(Room::class, 'reservations');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
