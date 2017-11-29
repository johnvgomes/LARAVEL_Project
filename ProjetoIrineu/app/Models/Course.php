<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =[
        'name',
    ];

    public function selectiveProcess() {
        return $this->belongsToMany('App\Models\SelectiveProcess')->withPivot('vacancy');
    }
}
