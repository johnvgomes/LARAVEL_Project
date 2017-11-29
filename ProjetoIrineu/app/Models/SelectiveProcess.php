<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectiveProcess extends Model
{

    protected $fillable =[   
        'name',
        'start_date',
        'end_date',
        'active',
        'description',
        'course_id',
        'quotas_id'
    ];


    public function subscription()
    {
        return $this->hasMany('App\Models\Subscription');
    }

    public function course() {
        return $this->belongsToMany('App\Models\Course')->withPivot('vacancy');
    }

    public function quota() {
        return $this->belongsToMany('App\Models\Quota')->withPivot('vacancy');
    }
}