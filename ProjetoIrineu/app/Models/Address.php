<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable =[        
        
        'street',
        'number',
        'cep',
        'neighborhood',
        'typeaddress',
        'city',
        'state',
        'country',
        'profile_id'
    ];

    public function profile(){
        return $this->belongsTo('App\Models\Profile');
    }
}
