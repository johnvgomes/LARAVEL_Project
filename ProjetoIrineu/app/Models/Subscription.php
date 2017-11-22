<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable =[
        
                'selective_process_id',
                'user_id',
                'payment_date',
                'paid',
                'subscription_date'
            ];

    public function users()
    {
        return $this->belongsTo('App\Models\Users');
    }

    public function selectiveprocess()
    {
        return $this->belongsTo('App\Models\SelectiveProcess');
    }
}