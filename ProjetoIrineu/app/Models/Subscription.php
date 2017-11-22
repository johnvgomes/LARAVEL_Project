<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    public function users()
    {
        return $this->belongsTo('App\Models\Users');
    }

    public function selectiveprocess()
    {
        return $this->belongsTo('App\Models\SelectiveProcess');
    }
}