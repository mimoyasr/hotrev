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
    protected $table = "reservations";

    function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
