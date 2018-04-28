<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\Client;
use App\Room;

class Reservation extends Model
{
    protected $fillable = [
        'client_id',
        'room_id',
        'accompany',
        'paid_price'
    ];

    function client()
    {
        return $this->belongsTo(Client::class);
    }

    function room()
    {
        return $this->belongsTo(Room::class);
    }

}
