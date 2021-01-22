<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'last_name', 'email', 'password', 'first_name', 'type_id', 'phonenumber', 'adress', 'city',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function type()
    {
        return $this->belongsTo('App\Type')->withDefault();
    }

    public function employeeshifts()
    {
        return $this->hasMany('App\EmployeeShift');
    }

    public function soldtickets()
    {
        return $this->hasMany('App\Soldtickets');
    }
}
