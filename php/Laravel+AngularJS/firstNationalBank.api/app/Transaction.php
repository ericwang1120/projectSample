<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_amount',
        'transaction_type'
    ];

    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
