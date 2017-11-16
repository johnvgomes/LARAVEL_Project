<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialNeed extends Model
{
    protected $fillable =[
        
                'description'
            ];

            public function profiles() {
                
                return $this->belongsToMany('App\Models\Profile')->withPivot('permanent','observation');
                
          
              }
}
