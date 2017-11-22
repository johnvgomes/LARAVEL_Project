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
                'description'
            ];


    public function subscription()
    {
        return $this->hasMany('App\Models\Subscription');
    }
}