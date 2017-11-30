<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialNeed extends Model
{
    protected $fillable = ['description'];

    public function profile() {
        
        return $this->belongsToMany('App\Models\Profile')->withPivot('permanent','observation');
        
    }
}
