<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    public function artist()
    {
        return $this->belongsTo('App\Artist')->withDefault();   // a record belongs to a genre
    }

    public function stage()
    {
        return $this->belongsTo('App\Stage')->withDefault();   // a record belongs to a genre
    }

    public function festival()
    {
        return $this->belongsTo('App\Festival')->withDefault();   // a record belongs to a genre
    }
}
