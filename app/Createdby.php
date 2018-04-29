<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Createdby extends Model
{
    protected $table = "createdbies";
    protected $fillable = [
        'creater',
        'created_by',
    ];
}
