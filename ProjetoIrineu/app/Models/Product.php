<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        
                'nome',
                'valor',
                'qtd',
                'category_id'
            ];

            public function category() {
                
                    return $this->belongsTo('App\Models\Category');
                
          
              }
          
}
