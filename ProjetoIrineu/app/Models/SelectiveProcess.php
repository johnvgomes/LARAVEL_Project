<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectiveProcess extends Model
{

    public function subscription()
    {
        return $this->hasMany('App\Models\Subscription');
    }
}