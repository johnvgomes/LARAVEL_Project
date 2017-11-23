<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =[        
        
        'date',
        'rg',
        'rgemitter',
        'cpf',
        'sex',
        'namefather',
        'namemother',
        'passport',
        'naturaless',
        'phone',
        'mobile',
        'scholarity',
        'user_id'
    ];

    public function specialneed() {        
        return $this->belongsToMany('App\Models\SpecialNeed')->withPivot('permanent','observation');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
