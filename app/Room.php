<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Room extends Model
{
    //
    protected $fillable = [
        'name',
        'capacity',
        'price',
        'floor_id',
         'number',
         'created_by',
         
    ];

    public function floor()
    {
        //User::class == 'App\User'
        return $this->belongsTo(Floor::class);
    }
}
