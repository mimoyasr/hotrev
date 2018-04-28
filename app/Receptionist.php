<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $table = "receptionist";
    //
    protected $fillable = [
        'national_id',
        'user_id',
        'photo',
        'created_by',

    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function usercretad()
    {
        return $this->belongsTo(User::class);
    }
}
