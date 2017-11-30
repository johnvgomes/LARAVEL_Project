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
        'subscription_date',
        'course_id',
        'quota_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function selectiveprocess()
    {
        return $this->belongsTo('App\Models\SelectiveProcess');
    }

    public function quota()
    {
        return $this->belongsTo('App\Models\Quota');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}