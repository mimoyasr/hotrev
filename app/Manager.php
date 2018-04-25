<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Manager extends Model
{
   protected $fillable=['national_id','photo','user_id'];


   public function user(){

    return $this->belongsTo(User::class);
   }
}
