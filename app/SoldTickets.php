<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldTickets extends Model
{


    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    public function ticket()
    {
        return $this->belongsTo('App\Ticket')->withDefault();
    }
}
