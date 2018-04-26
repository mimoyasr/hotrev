<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // $table->increments('id');
    // $table->integer('client_id');
    // $table->integer('room_id');
    // $table->integer('accompany');
    // $table->decimal('paid_price', 5, 2);

    protected $fillable = ['client_id', 'room_id', 'accompany', 'paid_price'];
    protected $table = "reservations";

    public function client()
    {

        return $this->belongsTo(Client::class);
    }
    public function room()
    {

        return $this->belongsTo(Room::class);
    }

}
