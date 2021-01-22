<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalTimetable extends Model
{
    public function performance()
    {
        return $this->belongsTo('App\Performance')->withDefault();   // a record belongs to a genre
    }
}
