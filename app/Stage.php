<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function performances()
    {
        return $this->hasMany('App\Performance');   // a genre has many records
    }
}
