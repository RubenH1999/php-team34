<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function soldtickets()
    {
        return $this->hasMany('App\Soldtickets');
    }

    public function festival()
    {
        return $this->belongsTo('App\Festival')->withDefault();
    }
}
