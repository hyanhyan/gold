<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [   //add this for updating
        'purity', 'buy', 'sell', 'metal_id',
    ];

    function rateHistory() {
        return $this->hasOne(RateHistory::class);
    }

}
