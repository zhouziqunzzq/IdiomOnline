<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
