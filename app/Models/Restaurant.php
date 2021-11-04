<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function plates()
    {
        return $this->hasMany('App\Models\Plate');
    }
}
