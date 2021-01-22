<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function task()
    {
        return $this->belongsTo('App\Task')->withDefault();

    }

    public function employeeshifts()
    {
        return $this->hasMany('App\EmployeeShift');

    }
}
