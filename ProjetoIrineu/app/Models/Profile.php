<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =[
        
                'name',
                'date',
                'rg',
                'rg-emitter',
                'cpf',
                'sex',
                'namefather',
                'namemother',
                'passport',
                'naturaless',
                'phone',
                'mobile',
                'escolaridade'

            ];

            public function specialneed() {
                
                return $this->belongsToMany('App\Models\SpecialNeed')->withPivot('permanent','observation');
                
          
              }
}
