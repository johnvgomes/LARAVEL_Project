<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable =[
        'selective_process_id',
        'user_id', 
        'quota_id',
        'course_id',
        'payment_date',
        'paid',
        'subscription_date'
    ]; 

    public $rules =[
        'payment_date' => 'required|date',
        'paid',
        'subscription_date'

    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

     public function selectiveprocess()
     {
         return $this->belongsTo('App\Models\SelectiveProcess');
     }

    // public function quota()
    // {
    //     return $this->belongsTo('App\Models\Quota');
    // }

    // public function course()
    // {
    //     return $this->belongsTo('App\Models\Course');
    // }
}