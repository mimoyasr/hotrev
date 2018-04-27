<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use App\Floor;


class Room extends Model
{
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

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
        
    }

    public function getPriceAttribute()
    {
        $dt = $this->attributes['price'];
        return $dt/100;
        
    }
    
}
