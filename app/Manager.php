<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
   protected $fillable=['national_id','photo','user_id'];
}
