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

    public $rules =[
        'street' => 'required|min:3|max:100',
        'number' => 'numeric|min:3',
        'cep' => 'required|min:3|max:100',
        'neighbordhood' => 'required|min:3|max:100',
        'typeaddress' => 'required|min:3|max:100',
        'city' => 'required|min:3|max:100',
        'state' => 'required|min:3|max:100',
        'country' => 'required|min:3|max:100',

    ];
    public function profile(){
        return $this->belongsTo('App\Models\Profile');
    }
}
