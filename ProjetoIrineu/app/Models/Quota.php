<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $fillable =[
        'description',
    ];

    public function selectiveProcess() {
        return $this->belongsToMany('App\Models\SelectiveProcess')->withPivot('vacancy');
    }
}
