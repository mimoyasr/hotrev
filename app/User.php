<?php

namespace App;

use Cog\Contracts\Ban\Bannable as BannableContract;
use Illuminate\Notifications\Notifiable;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use App\Receptionist;
class User extends Authenticatable implements BannableContract
{
    use Notifiable;
    use HasRoles;
    use Bannable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function receiption(){

        return $this->belongsTo(Receptionist::class);
       }
}