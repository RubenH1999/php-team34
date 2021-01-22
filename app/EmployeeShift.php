<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeShift extends Model
{
    public function shift()
    {
        return $this->belongsTo('App\Shift')->withDefault();   // a record belongs to a genre
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();   // a record belongs to a genre
    }
}
