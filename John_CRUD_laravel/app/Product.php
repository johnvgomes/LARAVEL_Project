<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        
                'nome',
                'valor',
                'qtd',
                'categories_id'
            ];
}
