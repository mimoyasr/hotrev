<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\User;

class Receptionist extends Model
{
    protected $table = "receptionist";
    //
    protected $fillable = [
        'national_id',
        'user_id',
        'photo',

    ];

 
        public function user(){

            return $this->belongsTo(User::class);
           }
    

}
